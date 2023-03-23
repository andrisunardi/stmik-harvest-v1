<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Exports\Configuration\UserExport;
use App\Http\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'User';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-user';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Configuration';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $user;

    public $name;

    public $username;

    public $email;

    public $phone;

    public $password;

    public $image;

    public $is_active = '';

    public $role_id = '';

    public $permission_id = '';

    public $roles_id = [];

    public $queryString = [
        'pageType' => ['except' => 'index'],
        'page' => ['except' => 1],
        'per_page' => ['except' => 10],
        'order_by' => ['except' => 'id'],
        'sort_by' => ['except' => 'desc'],
        'created_by_id' => ['except' => ''],
        'updated_by_id' => ['except' => ''],
        'deleted_by_id' => ['except' => ''],
        'start_created_at' => ['except' => ''],
        'end_created_at' => ['except' => ''],
        'start_updated_at' => ['except' => ''],
        'end_updated_at' => ['except' => ''],
        'start_deleted_at' => ['except' => ''],
        'end_deleted_at' => ['except' => ''],
        'row' => ['except' => ''],
        'checkbox_id' => ['except' => ''],
        'advanced_search' => ['except' => false],
        'action' => ['except' => ''],
        'detail' => ['except' => ''],

        'name' => ['except' => ''],
        'username' => ['except' => ''],
        'email' => ['except' => ''],
        'phone' => ['except' => ''],
        'password' => ['except' => ''],
        'is_active' => ['except' => ''],
        'role_id' => ['except' => ''],
        'permission_id' => ['except' => ''],
        'roles_id' => ['except' => ''],
    ];

    public function resetFilter()
    {
        $this->resetFilterGlobal();

        $this->reset([
            'user',
            'name',
            'username',
            'email',
            'phone',
            'password',
            'image',
            'is_active',
            'role_id',
            'permission_id',
            'roles_id',
        ]);
    }

    public function resetForm()
    {
        if ($this->user) {
            $this->name = $this->name ?: $this->user->name;
            $this->username = $this->username ?: $this->user->username;
            $this->email = $this->email ?: $this->user->email;
            $this->phone = $this->phone ?: $this->user->phone;
            $this->is_active = $this->is_active ?: $this->user->is_active;
            $this->roles_id = $this->roles_id ?: $this->user->roles->pluck('id')->toArray();
        }

        $this->alert('info', trans('index.reset_form'));
    }

    public function default()
    {
        $this->is_active = $this->is_active == 1 || ! $this->is_active ? 1 : 0;
    }

    public function mount()
    {
        if (! in_array($this->pageType, ['index', 'add', 'clone', 'edit', 'view', 'trash'])) {
            abort(404);
        }

        $this->checkPermission();

        if ($this->pageType == 'add') {
            $this->default();
        }

        if ($this->row && (! in_array($this->pageType, ['index', 'trash']))) {
            if ($this->pageType == 'view') {
                $this->user = User::withTrashed()->findOrFail($this->row);
            } else {
                $this->user = User::findOrFail($this->row);
            }

            if ($this->pageType != 'view') {
                $this->resetForm();
            }
        }
    }

    public function clone(User $user)
    {
        $this->pageType('clone', 'clone_form');

        $this->user = $user;
        $this->row = $user->id;

        $this->resetForm();
    }

    public function edit(User $user)
    {
        $this->pageType('edit', 'edit_form');

        $this->user = $user;
        $this->row = $user->id;

        $this->resetForm();
    }

    public function view($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $this->pageType('view', 'view_details');

        $this->user = $user;
        $this->row = $user->id;
    }

    public function rules()
    {
        $id = $this->pageType == 'edit' ? $this->user->id : null;
        $password = $this->pageType == 'edit' ? 'nullable' : 'required';

        return [
            'name' => "required|max:50|unique:{$this->pageTable},name,{$id}",
            'username' => "required|max:50|unique:{$this->pageTable},username,{$id}",
            'email' => "required|max:50|email:rfc,dns|regex:/^\S*$/u|unique:{$this->pageTable},email,{$id}",
            'phone' => "required|max:15|unique:{$this->pageTable},phone,{$id}",
            'password' => "{$password}|max:50",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
            'roles_id' => 'nullable|exists:roles,id',
        ];
    }

    public function submit()
    {
        $this->checkPermission();

        if ($this->pageType == 'add') {
            $action = 'added';
            (new UserService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new UserService())->clone($this->validate(), $this->user);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new UserService())->edit($this->user, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function deleteImage(User $user)
    {
        $this->checkPermission('edit');

        (new UserService())->deleteImage($user);

        $this->alert('success', trans('index.image_has_been_deleted_successfully'));
    }

    public function active(User $user)
    {
        $this->checkPermission('edit');

        (new UserService())->active($user);

        $active = Str::slug(Str::active($user->is_active), '_');

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_set_{$active}_successfully"));
    }

    public function delete(User $user)
    {
        $this->checkPermission('delete');

        (new UserService())->delete($user);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->checkPermission('restore');

        $user = User::onlyTrashed()->findOrFail($id);

        (new UserService())->restore($user);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->checkPermission('deletePermanent');

        $user = User::onlyTrashed()->findOrFail($id);

        (new UserService())->deletePermanent($user);

        if ($this->pageType == 'view') {
            $this->resetFilter();
            $this->resetValidation();

            $this->pageType = 'index';
        }

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_permanently_successfully'));
    }

    public function restoreAll(array $ids = [])
    {
        $this->checkPermission('restore');

        (new UserService())->restoreAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll(array $ids = [])
    {
        $this->checkPermission('deletePermanent');

        (new UserService())->deletePermanentAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.at_trash_has_been_deleted_permanently_successfully'));
    }

    public function getCreatedBies()
    {
        $created_by_id = User::groupBy('created_by_id')->pluck('created_by_id');

        return User::whereIn('id', $created_by_id)->active()->orderBy('name')->get();
    }

    public function getUpdatedBies()
    {
        $updated_by_id = User::groupBy('updated_by_id')->pluck('updated_by_id');

        return User::whereIn('id', $updated_by_id)->active()->orderBy('name')->get();
    }

    public function getDeletedBies()
    {
        $deleted_by_id = User::groupBy('deleted_by_id')->pluck('deleted_by_id');

        return User::whereIn('id', $deleted_by_id)->active()->orderBy('name')->get();
    }

    public function getRoles()
    {
        return Role::orderBy('name')->get();
    }

    public function getPermissions()
    {
        return Permission::orderBy('name')->get();
    }

    public function getUsers($paginate = true)
    {
        if (in_array($this->pageType, ['index', 'trash'])) {
            $users = User::with('createdBy', 'updatedBy', 'deletedBy', 'roles.permissions')
                ->when($this->role_id, fn ($q) => $q->role($this->role_id))
                ->when($this->permission_id, fn ($q) => $q->permission($this->permission_id))

                ->when($this->name, fn ($q) => $q->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->username, fn ($q) => $q->where('username', 'LIKE', "%{$this->username}%"))
                ->when($this->email, fn ($q) => $q->where('email', 'LIKE', "%{$this->email}%"))
                ->when($this->phone, fn ($q) => $q->where('phone', 'LIKE', "%{$this->phone}%"))

                ->when($this->is_active, fn ($q) => $q->where('is_active', $this->is_active == 2 ? false : true))
                ->when($this->created_by_id, fn ($q) => $q->where('created_by_id', $this->created_by_id))
                ->when($this->updated_by_id, fn ($q) => $q->where('updated_by_id', $this->updated_by_id))
                ->when($this->deleted_by_id, fn ($q) => $q->where('deleted_by_id', $this->deleted_by_id))
                ->when($this->start_created_at, fn ($q) => $q->whereDate('created_at', '>=', $this->start_created_at))
                ->when($this->end_created_at, fn ($q) => $q->whereDate('created_at', '<=', $this->end_created_at))
                ->when($this->start_updated_at, fn ($q) => $q->whereDate('updated_at', '>=', $this->start_updated_at))
                ->when($this->end_updated_at, fn ($q) => $q->whereDate('updated_at', '<=', $this->end_updated_at))
                ->when($this->start_deleted_at, fn ($q) => $q->whereDate('deleted_at', '>=', $this->start_deleted_at))
                ->when($this->end_deleted_at, fn ($q) => $q->whereDate('deleted_at', '<=', $this->end_deleted_at));

            if ($this->order_by == 'created_by_id') {
                $users->leftJoin('users', 'users.id', "{$this->pageTable}.created_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $users->leftJoin('users', 'users.id', "{$this->pageTable}.updated_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $users->leftJoin('users', 'users.id', "{$this->pageTable}.deleted_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } else {
                $users->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->pageType == 'trash') {
                $users->onlyTrashed();
            }

            if ($paginate) {
                return $users->paginate($this->per_page ?? 10);
            } else {
                return $users->get();
            }
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel');

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new UserExport($this->getUsers(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf');

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.pdf", [
            'users' => $this->getUsers(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = User::whereDate('created_at', now());
        $yesterday = User::whereDate('created_at', now()->subDay());

        $month = User::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->year);
        $lastMonth = User::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->year);

        $year = User::whereYear('created_at', now()->year);
        $lastYear = User::whereYear('created_at', now()->subYear()->year);

        $all = User::query();
        $beforeThisYear = User::whereYear('created_at', '<', now()->year);

        $todayCount = $today->count();
        $yesterdayCount = $yesterday->count();
        $todayCountPercentage = $todayCount && $yesterdayCount ? (($todayCount - $yesterdayCount) / $yesterdayCount) * 100 : 0;

        $monthCount = $month->count();
        $lastMonthCount = $lastMonth->count();
        $monthCountPercentage = $monthCount && $lastMonthCount ? (($monthCount - $lastMonthCount) / $lastMonthCount) * 100 : 0;

        $yearCount = $year->count();
        $lastYearCount = $lastYear->count();
        $yearCountPercentage = $yearCount && $lastYearCount ? (($yearCount - $lastYearCount) / $lastYearCount) * 100 : 0;

        $allCount = $all->count();
        $beforeThisYearCount = $beforeThisYear->count();
        $allCountPercentage = $allCount && $beforeThisYearCount ? (($allCount - $beforeThisYearCount) / $beforeThisYearCount) * 100 : 0;

        return collect([
            'todayCount' => $todayCount,
            'yesterdayCount' => $yesterdayCount,
            'todayCountPercentage' => $todayCountPercentage,
            'monthCount' => $monthCount,
            'lastMonthCount' => $lastMonthCount,
            'monthCountPercentage' => $monthCountPercentage,
            'yearCount' => $yearCount,
            'lastYearCount' => $lastYearCount,
            'yearCountPercentage' => $yearCountPercentage,
            'allCount' => $allCount,
            'beforeThisYearCount' => $beforeThisYearCount,
            'allCountPercentage' => $allCountPercentage,
        ]);
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.index", [
            'createdBies' => $this->readyToLoad ? $this->getCreatedBies() : collect(),
            'updatedBies' => $this->readyToLoad ? $this->getUpdatedBies() : collect(),
            'deletedBies' => $this->readyToLoad ? $this->getDeletedBies() : collect(),
            'roles' => $this->readyToLoad ? $this->getRoles() : collect(),
            'permissions' => $this->readyToLoad ? $this->getPermissions() : collect(),
            'users' => $this->readyToLoad ? $this->getUsers() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

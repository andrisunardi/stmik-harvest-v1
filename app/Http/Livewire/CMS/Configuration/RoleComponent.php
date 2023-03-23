<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Exports\Configuration\RoleExport;
use App\Http\Livewire\CMS\Component;
use App\Services\RoleService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Role';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-suitcase';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Configuration';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $role;

    public $name;

    public $guard_name;

    public $is_active = '';

    public $permission_id = '';

    public $permissions_id = [];

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
        'guard_name' => ['except' => ''],
        'permission_id' => ['except' => ''],
        'permissions_id' => ['except' => ''],
    ];

    public function resetFilter()
    {
        $this->resetFilterGlobal();

        $this->reset([
            'role',
            'name',
            'guard_name',
            'permission_id',
            'permissions_id',
        ]);
    }

    public function resetForm()
    {
        if ($this->role) {
            $this->name = $this->name ?: $this->role->name;
            $this->guard_name = $this->guard_name ?: $this->role->guard_name;
            $this->permissions_id = $this->permissions_id ?: $this->role->permissions->pluck('id')->toArray();
        }

        $this->alert('info', trans('index.reset_form'));
    }

    public function default()
    {
        $this->guard_name = 'web';
    }

    public function mount()
    {
        if (! in_array($this->pageType, ['index', 'add', 'clone', 'edit', 'view'])) {
            abort(404);
        }

        $this->checkPermission();

        if ($this->pageType == 'add') {
            $this->default();
        }

        if ($this->row && (! in_array($this->pageType, ['index']))) {
            $this->role = Role::findOrFail($this->row);

            if ($this->pageType != 'view') {
                $this->resetForm();
            }
        }
    }

    public function clone(Role $role)
    {
        $this->pageType('clone', 'clone_form');

        $this->role = $role;
        $this->row = $role->id;

        $this->resetForm();
    }

    public function edit(Role $role)
    {
        $this->pageType('edit', 'edit_form');

        $this->role = $role;
        $this->row = $role->id;

        $this->resetForm();
    }

    public function delete(Role $role)
    {
        $this->checkPermission('delete');

        (new RoleService())->delete($role);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function view(Role $role)
    {
        $this->pageType('view', 'view_details');

        $this->role = $role;
        $this->row = $role->id;
    }

    public function rules()
    {
        $id = $this->pageType == 'edit' ? $this->role->id : null;

        return [
            'name' => "required|max:255|unique:{$this->pageTable},name,{$id}",
            'guard_name' => 'required|max:255',
            'permissions_id' => 'nullable|exists:permissions,id',
        ];
    }

    public function submit()
    {
        $this->checkPermission();

        if ($this->pageType == 'add') {
            $action = 'added';
            (new RoleService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new RoleService())->clone($this->validate(), $this->role);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new RoleService())->edit($this->role, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function getPermissions()
    {
        return Permission::orderBy('name')->get();
    }

    public function getRoles($paginate = true)
    {
        if (in_array($this->pageType, ['index'])) {
            $roles = Role::with('permissions', 'users')
                ->when($this->name, fn ($q) => $q->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->guard_name, fn ($q) => $q->where('guard_name', 'LIKE', "%{$this->guard_name}%"))
                ->when($this->permission_id, fn ($q) => $q->whereRelation('permissions', 'id', $this->permission_id))

                ->when($this->start_created_at, fn ($q) => $q->whereDate('created_at', '>=', $this->start_created_at))
                ->when($this->end_created_at, fn ($q) => $q->whereDate('created_at', '<=', $this->end_created_at))
                ->when($this->start_updated_at, fn ($q) => $q->whereDate('updated_at', '>=', $this->start_updated_at))
                ->when($this->end_updated_at, fn ($q) => $q->whereDate('updated_at', '<=', $this->end_updated_at))
                ->when($this->start_deleted_at, fn ($q) => $q->whereDate('deleted_at', '>=', $this->start_deleted_at))
                ->when($this->end_deleted_at, fn ($q) => $q->whereDate('deleted_at', '<=', $this->end_deleted_at));

            $roles->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');

            if ($paginate) {
                return $roles->paginate($this->per_page ?? 10);
            }

            return $roles->get();
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel');

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new RoleExport($this->getRoles(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf');

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.pdf", [
            'roles' => $this->getRoles(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = Role::whereDate('created_at', now());
        $yesterday = Role::whereDate('created_at', now()->subDay());

        $month = Role::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->year);
        $lastMonth = Role::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->year);

        $year = Role::whereYear('created_at', now()->year);
        $lastYear = Role::whereYear('created_at', now()->subYear()->year);

        $all = Role::query();
        $beforeThisYear = Role::whereYear('created_at', '<', now()->year);

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
            'permissions' => $this->readyToLoad ? $this->getPermissions() : collect(),
            'roles' => $this->readyToLoad ? $this->getRoles() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

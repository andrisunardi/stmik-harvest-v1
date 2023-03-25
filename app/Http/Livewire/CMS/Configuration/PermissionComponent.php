<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Exports\Configuration\PermissionExport;
use App\Http\Livewire\CMS\Component;
use App\Services\PermissionService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Permission';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-key';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Configuration';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $permission;

    public $name;

    public $guard_name;

    public $is_active = '';

    public $role_id = '';

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
        'guard_name' => ['except' => ''],
        'role_id' => ['except' => ''],
        'roles_id' => ['except' => ''],
    ];

    public function resetFilter()
    {
        $this->resetFilterGlobal();

        $this->reset([
            'permission',
            'name',
            'guard_name',
            'role_id',
            'roles_id',
        ]);
    }

    public function setFormData()
    {
        if ($this->permission) {
            $this->name = $this->name ?: $this->permission->name;
            $this->guard_name = $this->guard_name ?: $this->permission->guard_name;
            $this->roles_id = $this->roles_id ?: $this->permission->roles->pluck('id')->toArray();
        }

        $this->alert('info', trans('index.set_form_data'));
    }

    public function resetForm()
    {
        if ($this->permission) {
            $this->name = $this->permission->name;
            $this->guard_name = $this->permission->guard_name;
            $this->roles_id = $this->permission->roles->pluck('id')->toArray();
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
            $this->permission = Permission::findOrFail($this->row);

            if ($this->pageType != 'view') {
                $this->setFormData();
            }
        }
    }

    public function clone(Permission $permission)
    {
        $this->pageType('clone', 'clone_form');

        $this->permission = $permission;
        $this->row = $permission->id;

        $this->setFormData();
    }

    public function edit(Permission $permission)
    {
        $this->pageType('edit', 'edit_form');

        $this->permission = $permission;
        $this->row = $permission->id;

        $this->setFormData();
    }

    public function view(Permission $permission)
    {
        $this->pageType('view', 'view_details');

        $this->permission = $permission;
        $this->row = $permission->id;
    }

    public function rules()
    {
        $id = $this->pageType == 'edit' ? $this->permission->id : null;

        return [
            'name' => "required|max:255|unique:{$this->pageTable},name,{$id}",
            'guard_name' => 'required|max:255',
            'roles_id' => 'nullable|exists:roles,id',
        ];
    }

    public function submit()
    {
        $this->checkPermission();

        if ($this->pageType == 'add') {
            $action = 'added';
            (new PermissionService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new PermissionService())->clone($this->validate(), $this->permission);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new PermissionService())->edit($this->permission, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function delete(Permission $permission)
    {
        $this->checkPermission('delete');

        (new PermissionService())->delete($permission);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function getRoles()
    {
        return Role::orderBy('name')->get();
    }

    public function getPermissions($paginate = true)
    {
        if (in_array($this->pageType, ['index'])) {
            $permissions = Permission::with('roles', 'users')
                ->when($this->name, fn ($q) => $q->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->guard_name, fn ($q) => $q->where('guard_name', 'LIKE', "%{$this->guard_name}%"))
                ->when($this->role_id, fn ($q) => $q->whereRelation('roles', 'id', $this->role_id))

                ->when($this->start_created_at, fn ($q) => $q->whereDate('created_at', '>=', $this->start_created_at))
                ->when($this->end_created_at, fn ($q) => $q->whereDate('created_at', '<=', $this->end_created_at))
                ->when($this->start_updated_at, fn ($q) => $q->whereDate('updated_at', '>=', $this->start_updated_at))
                ->when($this->end_updated_at, fn ($q) => $q->whereDate('updated_at', '<=', $this->end_updated_at))
                ->when($this->start_deleted_at, fn ($q) => $q->whereDate('deleted_at', '>=', $this->start_deleted_at))
                ->when($this->end_deleted_at, fn ($q) => $q->whereDate('deleted_at', '<=', $this->end_deleted_at));

            $permissions->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');

            if ($paginate) {
                return $permissions->paginate($this->per_page ?? 10);
            }

            return $permissions->get();
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel');

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new PermissionExport($this->getPermissions(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf');

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.pdf", [
            'permissions' => $this->getPermissions(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = Permission::whereDate('created_at', now());
        $yesterday = Permission::whereDate('created_at', now()->subDay());

        $month = Permission::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->year);
        $lastMonth = Permission::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->year);

        $year = Permission::whereYear('created_at', now()->year);
        $lastYear = Permission::whereYear('created_at', now()->subYear()->year);

        $all = Permission::query();
        $beforeThisYear = Permission::whereYear('created_at', '<', now()->year);

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
            'roles' => $this->readyToLoad ? $this->getRoles() : collect(),
            'permissions' => $this->readyToLoad ? $this->getPermissions() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

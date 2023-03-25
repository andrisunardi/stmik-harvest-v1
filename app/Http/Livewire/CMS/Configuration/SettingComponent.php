<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Exports\Configuration\SettingExport;
use App\Http\Livewire\CMS\Component;
use App\Models\Setting;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SettingComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Setting';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-gear';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Configuration';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $setting;

    public $key;

    public $value;

    public $is_active = '';

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

        'key' => ['except' => ''],
        'value' => ['except' => ''],
        'is_active' => ['except' => ''],
    ];

    public function resetFilter()
    {
        $this->resetFilterGlobal();

        $this->reset([
            'setting',
            'key',
            'value',
            'is_active',
        ]);
    }

    public function setFormData()
    {
        if ($this->setting) {
            $this->key = $this->key ?: $this->setting->key;
            $this->value = $this->value ?: $this->setting->value;
            $this->is_active = $this->is_active ?: $this->setting->is_active;
        }

        $this->alert('info', trans('index.set_form_data'));
    }

    public function resetForm()
    {
        if ($this->setting) {
            $this->key = $this->setting->key;
            $this->value = $this->setting->value;
            $this->is_active = $this->setting->is_active;
        }

        $this->alert('info', trans('index.reset_form'));
    }

    public function default()
    {
        $this->is_active = 1;
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
                $this->setting = Setting::withTrashed()->findOrFail($this->row);
            } else {
                $this->setting = Setting::findOrFail($this->row);
            }

            if ($this->pageType != 'view') {
                $this->resetForm();
            }
        }
    }

    public function clone(Setting $setting)
    {
        $this->pageType('clone', 'clone_form');

        $this->setting = $setting;
        $this->row = $setting->id;

        $this->setFormData();
    }

    public function edit(Setting $setting)
    {
        $this->pageType('edit', 'edit_form');

        $this->setting = $setting;
        $this->row = $setting->id;

        $this->setFormData();
    }

    public function view($id)
    {
        $setting = Setting::withTrashed()->findOrFail($id);

        $this->pageType('view', 'view_details');

        $this->setting = $setting;
        $this->row = $setting->id;
    }

    public function rules()
    {
        $id = $this->pageType == 'edit' ? $this->setting->id : null;

        return [
            'key' => "required|max:100|unique:{$this->pageTable},key,{$id}",
            'value' => 'required|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $this->checkPermission();

        if ($this->pageType == 'add') {
            $action = 'added';
            (new SettingService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new SettingService())->clone($this->validate(), $this->setting);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new SettingService())->edit($this->setting, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function active(Setting $setting)
    {
        $this->checkPermission('edit');

        (new SettingService())->active($setting);

        $active = Str::slug(Str::active($setting->is_active), '_');

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_set_{$active}_successfully"));
    }

    public function delete(Setting $setting)
    {
        $this->checkPermission('delete');

        (new SettingService())->delete($setting);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->checkPermission('restore');

        $setting = Setting::onlyTrashed()->findOrFail($id);

        (new SettingService())->restore($setting);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->checkPermission('deletePermanent');

        $setting = Setting::onlyTrashed()->findOrFail($id);

        (new SettingService())->deletePermanent($setting);

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

        (new SettingService())->restoreAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll(array $ids = [])
    {
        $this->checkPermission('deletePermanent');

        (new SettingService())->deletePermanentAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.at_trash_has_been_deleted_permanently_successfully'));
    }

    public function getCreatedBies()
    {
        $created_by_id = Setting::groupBy('created_by_id')->pluck('created_by_id');

        return User::whereIn('id', $created_by_id)->active()->orderBy('name')->get();
    }

    public function getUpdatedBies()
    {
        $updated_by_id = Setting::groupBy('updated_by_id')->pluck('updated_by_id');

        return User::whereIn('id', $updated_by_id)->active()->orderBy('name')->get();
    }

    public function getDeletedBies()
    {
        $deleted_by_id = Setting::groupBy('deleted_by_id')->pluck('deleted_by_id');

        return User::whereIn('id', $deleted_by_id)->active()->orderBy('name')->get();
    }

    public function getSettings($paginate = true)
    {
        if (in_array($this->pageType, ['index', 'trash'])) {
            $settings = Setting::with('createdBy', 'updatedBy', 'deletedBy')
                ->when($this->key, fn ($q) => $q->where('key', 'LIKE', "%{$this->key}%"))
                ->when($this->value, fn ($q) => $q->where('value', 'LIKE', "%{$this->value}%"))

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
                $settings->leftJoin('users', 'users.id', "{$this->pageTable}.created_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $settings->leftJoin('users', 'users.id', "{$this->pageTable}.updated_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $settings->leftJoin('users', 'users.id', "{$this->pageTable}.deleted_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } else {
                $settings->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->pageType == 'trash') {
                $settings->onlyTrashed();
            }

            if ($paginate) {
                return $settings->paginate($this->per_page ?? 10);
            }

            return $settings->get();
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel');

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new SettingExport($this->getSettings(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf');

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.pdf", [
            'settings' => $this->getSettings(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = Setting::whereDate('created_at', now());
        $yesterday = Setting::whereDate('created_at', now()->subDay());

        $month = Setting::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->year);
        $lastMonth = Setting::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->year);

        $year = Setting::whereYear('created_at', now()->year);
        $lastYear = Setting::whereYear('created_at', now()->subYear()->year);

        $all = Setting::query();
        $beforeThisYear = Setting::whereYear('created_at', '<', now()->year);

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
            'settings' => $this->readyToLoad ? $this->getSettings() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

<?php

namespace App\Http\Livewire\CMS\Event;

use App\Exports\Event\EventCategoryExport;
use App\Http\Livewire\CMS\Component;
use App\Models\EventCategory;
use App\Models\User;
use App\Services\EventCategoryService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EventCategoryComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Event Category';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-tags';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Event';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $eventCategory;

    public $name;

    public $name_idn;

    public $description;

    public $description_idn;

    public $slug;

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

        'name' => ['except' => ''],
        'name_idn' => ['except' => ''],
        'description' => ['except' => ''],
        'description_idn' => ['except' => ''],
        'slug' => ['except' => ''],
        'is_active' => ['except' => ''],
    ];

    public function loadData()
    {
        $this->readyToLoad = true;

        $this->alert('info', trans('index.data_have_been_loaded_successfully'));
    }

    public function sort($column, $sort)
    {
        $this->order_by = $column;
        $this->sort_by = $sort;

        $this->resetPage();
        $this->alert('info', trans('index.sort').' '.trans("index.{$column}").' '.trans("index.{$sort}"));
    }

    public function advancedSearch()
    {
        $this->advanced_search = ! $this->advanced_search;

        $this->alert('info', trans('index.advanced_search'));
    }

    public function action($id)
    {
        $this->action[$id] = empty($this->action[$id]) ? true : false;

        if (! $this->action[$id]) {
            unset($this->action[$id]);
        }

        $this->alert('info', trans('index.action')." - ID: {$id}");
    }

    public function detail($id)
    {
        $this->detail[$id] = empty($this->detail[$id]) ? true : false;

        if (! $this->detail[$id]) {
            unset($this->detail[$id]);
        }

        $this->alert('info', trans('index.detail')." - ID: {$id}");
    }

    public function resetFilter()
    {
        $this->resetPage();

        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = 'id';
        $this->sort_by = 'desc';

        $this->reset([
            'created_by_id',
            'updated_by_id',
            'deleted_by_id',
            'start_created_at',
            'end_created_at',
            'start_updated_at',
            'end_updated_at',
            'start_deleted_at',
            'end_deleted_at',
            'row',
            'checkbox_id',
            'action',
            'detail',
        ]);

        $this->reset([
            'eventCategory',
            'name',
            'name_idn',
            'description',
            'description_idn',
            'slug',
            'is_active',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function resetForm()
    {
        if ($this->eventCategory) {
            $this->name = $this->name ?: $this->eventCategory->name;
            $this->name_idn = $this->name_idn ?: $this->eventCategory->name_idn;
            $this->description = $this->description ?: $this->eventCategory->description;
            $this->description_idn = $this->description_idn ?: $this->eventCategory->description_idn;
            $this->is_active = $this->is_active ?: $this->eventCategory->is_active ?: '';
        }

        $this->alert('info', trans('index.reset_form'));
    }

    public function refresh()
    {
        $this->resetValidation();
        $this->alert('info', trans('index.refresh'));
    }

    public function updating($name, $value)
    {
        $this->resetPage();
        $this->alert('info', trans('index.updating').' '.trans("validation.attributes.{$name}").' : '.json_encode($value));
    }

    public function updated($name, $value)
    {
        $this->resetPage();
        $this->alert('info', trans('index.updated').' '.trans("validation.attributes.{$name}").' : '.json_encode($value));
    }

    public function mount()
    {
        if (! in_array($this->pageType, ['index', 'add', 'clone', 'edit', 'view', 'trash'])) {
            abort(404);
        }

        $this->checkPermission();

        if ($this->pageType == 'add') {
            $this->is_active = $this->is_active == 1 || ! $this->is_active ? 1 : 0;
        }

        if ($this->row && (! in_array($this->pageType, ['index', 'trash']))) {
            if ($this->pageType == 'view') {
                $this->eventCategory = EventCategory::withTrashed()->findOrFail($this->row);
            } else {
                $this->eventCategory = EventCategory::findOrFail($this->row);
            }

            if ($this->pageType != 'view') {
                $this->resetForm();
            }
        }
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetValidation();

        $this->pageType = 'index';

        $this->alert('info', trans('index.back_to_list_data'));
    }

    public function add()
    {
        $this->checkPermission();

        $this->resetFilter();
        $this->resetValidation();

        $this->is_active = $this->is_active == 1 || ! $this->is_active ? 1 : 0;
        $this->pageType = 'add';

        $this->alert('info', trans('index.form').' '.trans('index.add'));
    }

    public function edit($id)
    {
        $this->checkPermission();

        $this->resetFilter();
        $this->resetValidation();

        $this->eventCategory = EventCategory::find($id);

        if (! $this->eventCategory) {
            return $this->flash(
                'error',
                "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'),
                [],
                route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSubCategorySlug}.{$this->pageSlug}.index"),
            );
        }

        $this->resetForm();

        $this->pageType = 'edit';
        $this->row = $id;

        $this->alert('info', trans('index.form').' '.trans('index.edit'));
    }

    public function clone($id)
    {
        $this->checkPermission();

        $this->resetFilter();
        $this->resetValidation();

        $this->eventCategory = EventCategory::find($id);

        if (! $this->eventCategory) {
            return $this->flash(
                'error',
                "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'),
                [],
                route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSubCategorySlug}.{$this->pageSlug}.index"),
            );
        }

        $this->resetForm();

        $this->pageType = 'clone';
        $this->row = $id;

        $this->alert('info', trans('index.form').' '.trans('index.clone'));
    }

    public function view($id)
    {
        $this->resetFilter();
        $this->resetValidation();

        $this->pageType = 'view';
        $this->row = $id;

        $this->eventCategory = EventCategory::withTrashed()->find($id);

        if (! $this->eventCategory) {
            return $this->flash(
                'error',
                "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'),
                [],
                route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSubCategorySlug}.{$this->pageSlug}.index"),
            );
        }

        $this->alert('info', trans('index.view').' '.trans('index.detail'));
    }

    public function trash()
    {
        $this->checkPermission();

        $this->resetFilter();
        $this->resetValidation();

        $this->pageType = 'trash';

        $this->alert('info', trans('index.data').' '.trans('index.trash'));
    }

    public function rules()
    {
        $id = $this->pageType == 'edit' ? $this->eventCategory->id : null;

        return [
            'name' => "required|max:100|unique:{$this->pageTable},name,{$id}",
            'name_idn' => "required|max:100|unique:{$this->pageTable},name_idn,{$id}",
            'description' => 'nullable|max:65535',
            'description_idn' => 'nullable|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $this->checkPermission();

        if ($this->pageType == 'add') {
            $action = 'added';
            (new EventCategoryService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new EventCategoryService())->clone($this->validate(), $this->eventCategory);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new EventCategoryService())->edit($this->eventCategory, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function active($id)
    {
        $this->checkPermission('edit');

        $eventCategory = EventCategory::find($id);

        if (! $eventCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new EventCategoryService())->active($eventCategory);

        $active = Str::slug(Str::active($eventCategory->is_active), '_');

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_set_{$active}_successfully"));
    }

    public function delete($id)
    {
        $this->checkPermission();

        $eventCategory = EventCategory::find($id);

        if (! $eventCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new EventCategoryService())->delete($eventCategory);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->checkPermission();

        $eventCategory = EventCategory::onlyTrashed()->find($id);

        if (! $eventCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new EventCategoryService())->restore($eventCategory);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->checkPermission();

        $eventCategory = EventCategory::onlyTrashed()->find($id);

        if (! $eventCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new EventCategoryService())->deletePermanent($eventCategory);

        if ($this->pageType == 'view') {
            $this->resetFilter();
            $this->resetValidation();

            $this->pageType = 'index';
        }

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_permanently_successfully'));
    }

    public function restoreAll(array $ids = [])
    {
        $this->checkPermission();

        (new EventCategoryService())->restoreAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll(array $ids = [])
    {
        $this->checkPermission();

        (new EventCategoryService())->deletePermanentAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.at_trash_has_been_deleted_permanently_successfully'));
    }

    public function getCreatedBies()
    {
        $created_by_id = EventCategory::groupBy('created_by_id')->pluck('created_by_id');

        return User::whereIn('id', $created_by_id)->active()->orderBy('name')->get();
    }

    public function getUpdatedBies()
    {
        $updated_by_id = EventCategory::groupBy('updated_by_id')->pluck('updated_by_id');

        return User::whereIn('id', $updated_by_id)->active()->orderBy('name')->get();
    }

    public function getDeletedBies()
    {
        $deleted_by_id = EventCategory::groupBy('deleted_by_id')->pluck('deleted_by_id');

        return User::whereIn('id', $deleted_by_id)->active()->orderBy('name')->get();
    }

    public function getEventCategorys($paginate = true)
    {
        if (in_array($this->pageType, ['index', 'trash'])) {
            $eventCategories = EventCategory::with('createdBy', 'updatedBy', 'deletedBy', 'events')
                ->when($this->name, fn ($q) => $q->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$this->name_idn}%"))
                ->when($this->description, fn ($q) => $q->where('description', 'LIKE', "%{$this->description}%"))
                ->when($this->description_idn, fn ($q) => $q->where('description_idn', 'LIKE', "%{$this->description_idn}%"))
                ->when($this->slug, fn ($q) => $q->where('slug', 'LIKE', "%{$this->slug}%"))

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
                $eventCategories->leftJoin('users', 'users.id', "{$this->pageTable}.created_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $eventCategories->leftJoin('users', 'users.id', "{$this->pageTable}.updated_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $eventCategories->leftJoin('users', 'users.id', "{$this->pageTable}.deleted_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } else {
                $eventCategories->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->pageType == 'trash') {
                $eventCategories->onlyTrashed();
            }

            if ($paginate) {
                return $eventCategories->paginate($this->per_page ?? 10);
            } else {
                return $eventCategories->get();
            }
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel', 'exportToExcel', "{$this->pageName} Export To Excel");

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new EventCategoryExport($this->getEventCategorys(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf', 'exportToPdf', "{$this->pageName} Export To PDF");

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSubCategorySlug}.{$this->pageSlug}.pdf", [
            'eventCategories' => $this->getEventCategorys(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = EventCategory::whereDate('created_at', now());
        $yesterday = EventCategory::whereDate('created_at', now()->subDay());

        $month = EventCategory::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->year);
        $lastMonth = EventCategory::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->year);

        $year = EventCategory::whereYear('created_at', now()->year);
        $lastYear = EventCategory::whereYear('created_at', now()->subYear()->year);

        $all = EventCategory::query();
        $beforeThisYear = EventCategory::whereYear('created_at', '<', now()->year);

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
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSubCategorySlug}.{$this->pageSlug}.index", [
            'createdBies' => $this->readyToLoad ? $this->getCreatedBies() : collect(),
            'updatedBies' => $this->readyToLoad ? $this->getUpdatedBies() : collect(),
            'deletedBies' => $this->readyToLoad ? $this->getDeletedBies() : collect(),
            'eventCategories' => $this->readyToLoad ? $this->getEventCategorys() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

<?php

namespace App\Http\Livewire\CMS\Finance\Payment;

use App\Exports\Finance\Payment\PaymentCategoryExport;
use App\Http\Livewire\CMS\Component;
use App\Models\PaymentCategory;
use App\Models\User;
use App\Services\PaymentCategoryService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PaymentCategoryComponent extends Component
{
    public $pageName;

    public $pageTitle;

    public $pageSlug;

    public $pageIcon;

    public $pageTable;

    public $pageCategoryName;

    public $pageCategoryTitle;

    public $pageCategorySlug;

    public $pageSubCategoryName;

    public $pageSubCategoryTitle;

    public $pageSubCategorySlug;

    public function boot()
    {
        $this->pageName = 'Payment Category';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-tags';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Finance';
        $this->pageCategoryTitle = trans('index.'.Str::snake($this->pageCategoryName));
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = 'Payment';
        $this->pageSubCategoryTitle = trans('index.'.Str::snake($this->pageSubCategoryName));
        $this->pageSubCategorySlug = Str::slug($this->pageSubCategoryName);
    }

    public $readyToLoad = false;

    public $pageType = 'index';

    public $page = 1;

    public $per_page = 10;

    public $order_by = 'id';

    public $sort_by = 'desc';

    public $start_created_at;

    public $end_created_at;

    public $start_updated_at;

    public $end_updated_at;

    public $start_deleted_at;

    public $end_deleted_at;

    public $created_by_id = '';

    public $updated_by_id = '';

    public $deleted_by_id = '';

    public $row;

    public $advanced_search = false;

    public $action = [];

    public $detail = [];

    public $checkbox_all;

    public $checkbox_id;

    public $paymentCategory;

    public $code;

    public $name;

    public $description;

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

        'code' => ['except' => ''],
        'name' => ['except' => ''],
        'description' => ['except' => ''],
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
            'paymentCategory',
            'code',
            'name',
            'description',
            'is_active',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function resetForm()
    {
        if ($this->paymentCategory) {
            $this->name = $this->name ?: $this->paymentCategory->name;
            $this->description = $this->description ?: $this->paymentCategory->description;
            $this->is_active = $this->is_active ?: $this->paymentCategory->is_active;
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

        $this->checkPermission($this->pageType, 'add', "{$this->pageName} Add");
        $this->checkPermission($this->pageType, 'clone', "{$this->pageName} Clone");
        $this->checkPermission($this->pageType, 'edit', "{$this->pageName} Edit");
        $this->checkPermission($this->pageType, 'trash', "{$this->pageName} Trash");

        if ($this->pageType == 'add') {
            $this->is_active = 1;
        }

        if ($this->row && (! in_array($this->pageType, ['index', 'trash']))) {
            if ($this->pageType == 'view') {
                $this->paymentCategory = PaymentCategory::withTrashed()->findOrFail($this->row);
            } else {
                $this->paymentCategory = PaymentCategory::findOrFail($this->row);
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
        $this->checkPermission('add', 'add', "{$this->pageName} Add");

        $this->resetFilter();
        $this->resetValidation();

        $this->is_active = 1;
        $this->pageType = 'add';

        $this->alert('info', trans('index.form').' '.trans('index.add'));
    }

    public function edit($id)
    {
        $this->checkPermission('edit', 'edit', "{$this->pageName} Edit");

        $this->resetFilter();
        $this->resetValidation();

        $this->paymentCategory = PaymentCategory::find($id);

        if (! $this->paymentCategory) {
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
        $this->checkPermission('clone', 'clone', "{$this->pageName} Clone");

        $this->resetFilter();
        $this->resetValidation();

        $this->paymentCategory = PaymentCategory::find($id);

        if (! $this->paymentCategory) {
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

        $this->paymentCategory = PaymentCategory::withTrashed()->find($id);

        if (! $this->paymentCategory) {
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
        $this->checkPermission('trash', 'trash', "{$this->pageName} Trash");

        $this->resetFilter();
        $this->resetValidation();

        $this->pageType = 'trash';

        $this->alert('info', trans('index.data').' '.trans('index.trash'));
    }

    public function rules()
    {
        $id = $this->pageType == 'edit' ? $this->paymentCategory->id : null;

        return [
            'name' => "required|max:50|unique:{$this->pageTable},name,{$id}",
            'description' => 'nullable|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $this->checkPermission('add', 'add', "{$this->pageName} Add");
        $this->checkPermission('clone', 'clone', "{$this->pageName} Clone");
        $this->checkPermission('edit', 'edit', "{$this->pageName} Edit");

        if ($this->pageType == 'add') {
            $action = 'added';
            (new PaymentCategoryService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new PaymentCategoryService())->clone($this->validate(), $this->paymentCategory);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new PaymentCategoryService())->edit($this->paymentCategory, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function active($id)
    {
        $this->checkPermission('edit', 'edit', "{$this->pageName} Edit");

        $paymentCategory = PaymentCategory::find($id);

        if (! $paymentCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new PaymentCategoryService())->active($paymentCategory);

        $active = Str::slug(Str::active($paymentCategory->is_active), '_');

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_set_{$active}_successfully"));
    }

    public function delete($id)
    {
        $this->checkPermission('delete', 'delete', "{$this->pageName} Delete");

        $paymentCategory = PaymentCategory::find($id);

        if (! $paymentCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new PaymentCategoryService())->delete($paymentCategory);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->checkPermission('restore', 'restore', "{$this->pageName} Restore");

        $paymentCategory = PaymentCategory::onlyTrashed()->find($id);

        if (! $paymentCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new PaymentCategoryService())->restore($paymentCategory);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->checkPermission('deletePermanent', 'deletePermanent', "{$this->pageName} Delete Permanent");

        $paymentCategory = PaymentCategory::onlyTrashed()->find($id);

        if (! $paymentCategory) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new PaymentCategoryService())->deletePermanent($paymentCategory);

        if ($this->pageType == 'view') {
            $this->resetFilter();
            $this->resetValidation();

            $this->pageType = 'index';
        }

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_permanently_successfully'));
    }

    public function restoreAll(array $ids = [])
    {
        $this->checkPermission('restore', 'restore', "{$this->pageName} Restore");

        (new PaymentCategoryService())->restoreAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll(array $ids = [])
    {
        $this->checkPermission('deletePermanent', 'deletePermanent', "{$this->pageName} Delete Permanent");

        (new PaymentCategoryService())->deletePermanentAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.at_trash_has_been_deleted_permanently_successfully'));
    }

    public function getCreatedBies()
    {
        $created_by_id = PaymentCategory::groupBy('created_by_id')->pluck('created_by_id');

        return User::whereIn('id', $created_by_id)->active()->orderBy('name')->get();
    }

    public function getUpdatedBies()
    {
        $updated_by_id = PaymentCategory::groupBy('updated_by_id')->pluck('updated_by_id');

        return User::whereIn('id', $updated_by_id)->active()->orderBy('name')->get();
    }

    public function getDeletedBies()
    {
        $deleted_by_id = PaymentCategory::groupBy('deleted_by_id')->pluck('deleted_by_id');

        return User::whereIn('id', $deleted_by_id)->active()->orderBy('name')->get();
    }

    public function getPaymentCategorys($paginate = true)
    {
        if (in_array($this->pageType, ['index', 'trash'])) {
            $paymentCategories = PaymentCategory::with('createdBy', 'updatedBy', 'deletedBy', 'payments')
                ->when($this->code, fn ($q) => $q->where('code', 'LIKE', "%{$this->code}%"))
                ->when($this->name, fn ($q) => $q->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->description, fn ($q) => $q->where('description', 'LIKE', "%{$this->description}%"))

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
                $paymentCategories->leftJoin('users', 'users.id', "{$this->pageTable}.created_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $paymentCategories->leftJoin('users', 'users.id', "{$this->pageTable}.updated_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $paymentCategories->leftJoin('users', 'users.id', "{$this->pageTable}.deleted_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } else {
                $paymentCategories->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->pageType == 'trash') {
                $paymentCategories->onlyTrashed();
            }

            if ($paginate) {
                return $paymentCategories->paginate($this->per_page ?? 10);
            } else {
                return $paymentCategories->get();
            }
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel', 'exportToExcel', "{$this->pageName} Export To Excel");

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new PaymentCategoryExport($this->getPaymentCategorys(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf', 'exportToPdf', "{$this->pageName} Export To PDF");

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSubCategorySlug}.{$this->pageSlug}.pdf", [
            'paymentCategories' => $this->getPaymentCategorys(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = PaymentCategory::whereDate('created_at', now());
        $yesterday = PaymentCategory::whereDate('created_at', now()->subDay());

        $month = PaymentCategory::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'));
        $lastMonth = PaymentCategory::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->format('Y'));

        $year = PaymentCategory::whereYear('created_at', now()->format('Y'));
        $lastYear = PaymentCategory::whereYear('created_at', now()->subYear()->format('Y'));

        $all = PaymentCategory::query();
        $beforeThisYear = PaymentCategory::whereYear('created_at', '<', now()->format('Y'));

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
            'paymentCategories' => $this->readyToLoad ? $this->getPaymentCategorys() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
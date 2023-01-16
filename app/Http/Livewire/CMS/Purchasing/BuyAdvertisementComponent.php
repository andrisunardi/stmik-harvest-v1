<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Exports\Purchasing\BuyAdvertisementExport;
use App\Http\Livewire\CMS\Component;
use App\Models\AdvertisementProvider;
use App\Models\Bank;
use App\Models\BuyAdvertisement;
use App\Models\User;
use App\Services\BuyAdvertisementService;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class BuyAdvertisementComponent extends Component
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
        $this->pageName = 'Buy Advertisement';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-bullhorn';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Purchasing';
        $this->pageCategoryTitle = trans('index.'.Str::snake($this->pageCategoryName));
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
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

    public $buyAdvertisement;

    public $code;

    public $advertisement_provider_id = '';

    public $bank_id = '';

    public $account_number;

    public $account_name;

    public $amount;

    public $image;

    public $date;

    public $time;

    public $notes;

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
        'advertisement_provider_id' => ['except' => ''],
        'bank_id' => ['except' => ''],
        'account_number' => ['except' => ''],
        'account_name' => ['except' => ''],
        'amount' => ['except' => ''],
        'date' => ['except' => ''],
        'time' => ['except' => ''],
        'notes' => ['except' => ''],
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
        $this->alert('info', trans('ind-ex.sort').' '.trans("index.{$column}").' '.trans("index.{$sort}"));
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
            'buyAdvertisement',
            'code',
            'advertisement_provider_id',
            'bank_id',
            'account_number',
            'account_name',
            'amount',
            'image',
            'date',
            'time',
            'notes',
            'is_active',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function resetForm()
    {
        if ($this->buyAdvertisement) {
            $this->advertisement_provider_id = $this->advertisement_provider_id ?: $this->buyAdvertisement->advertisement_provider_id;
            $this->bank_id = $this->bank_id ?: $this->buyAdvertisement->bank_id;
            $this->account_number = $this->account_number ?: $this->buyAdvertisement->account_number;
            $this->account_name = $this->account_name ?: $this->buyAdvertisement->account_name;
            $this->amount = $this->amount ?: $this->buyAdvertisement->amount;
            $this->date = $this->date ?: $this->buyAdvertisement->datetime?->format('Y-m-d');
            $this->time = $this->time ?: $this->buyAdvertisement->datetime?->format('H:i');
            $this->notes = $this->notes ?: $this->buyAdvertisement->notes;
            $this->is_active = $this->is_active ?: $this->buyAdvertisement->is_active;
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
            $this->date = now()->format('Y-m-d');
            $this->time = now()->format('H:i');
            $this->is_active = 1;
        }

        if ($this->row && (! in_array($this->pageType, ['index', 'trash']))) {
            if ($this->pageType == 'view') {
                $this->buyAdvertisement = BuyAdvertisement::withTrashed()->findOrFail($this->row);
            } else {
                $this->buyAdvertisement = BuyAdvertisement::findOrFail($this->row);
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

        $this->date = now()->format('Y-m-d');
        $this->time = now()->format('H:i');
        $this->is_active = 1;
        $this->pageType = 'add';

        $this->alert('info', trans('index.form').' '.trans('index.add'));
    }

    public function edit($id)
    {
        $this->checkPermission('edit', 'edit', "{$this->pageName} Edit");

        $this->resetFilter();
        $this->resetValidation();

        $this->buyAdvertisement = BuyAdvertisement::find($id);

        if (! $this->buyAdvertisement) {
            return $this->flash(
                'error',
                "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'),
                [],
                route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"),
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

        $this->buyAdvertisement = BuyAdvertisement::find($id);

        if (! $this->buyAdvertisement) {
            return $this->flash(
                'error',
                "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'),
                [],
                route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"),
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

        $this->buyAdvertisement = BuyAdvertisement::withTrashed()->find($id);

        if (! $this->buyAdvertisement) {
            return $this->flash(
                'error',
                "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'),
                [],
                route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"),
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
        return [
            'advertisement_provider_id' => 'required|integer|numeric|exists:advertisement_providers,id',
            'bank_id' => 'required|integer|numeric|exists:banks,id',
            'account_number' => 'nullable|max:20',
            'account_name' => 'nullable|max:30',
            'amount' => 'required|min:0|max:4294967295|integer|numeric',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'date' => 'required|date|date_format:Y-m-d',
            'time' => 'required|date_format:H:i:s',
            'notes' => 'nullable|max:65535',
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
            (new BuyAdvertisementService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new BuyAdvertisementService())->clone($this->validate(), $this->buyAdvertisement);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new BuyAdvertisementService())->edit($this->buyAdvertisement, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function active($id)
    {
        $this->checkPermission('edit', 'edit', "{$this->pageName} Edit");

        $buyAdvertisement = BuyAdvertisement::find($id);

        if (! $buyAdvertisement) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new BuyAdvertisementService())->active($buyAdvertisement);

        $active = Str::slug(Str::active($buyAdvertisement->is_active), '_');

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_set_{$active}_successfully"));
    }

    public function delete($id)
    {
        $this->checkPermission('delete', 'delete', "{$this->pageName} Delete");

        $buyAdvertisement = BuyAdvertisement::find($id);

        if (! $buyAdvertisement) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new BuyAdvertisementService())->delete($buyAdvertisement);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->checkPermission('restore', 'restore', "{$this->pageName} Restore");

        $buyAdvertisement = BuyAdvertisement::onlyTrashed()->find($id);

        if (! $buyAdvertisement) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new BuyAdvertisementService())->restore($buyAdvertisement);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->checkPermission('deletePermanent', 'deletePermanent', "{$this->pageName} Delete Permanent");

        $buyAdvertisement = BuyAdvertisement::onlyTrashed()->find($id);

        if (! $buyAdvertisement) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new BuyAdvertisementService())->deletePermanent($buyAdvertisement);

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

        (new BuyAdvertisementService())->restoreAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll(array $ids = [])
    {
        $this->checkPermission('deletePermanent', 'deletePermanent', "{$this->pageName} Delete Permanent");

        (new BuyAdvertisementService())->deletePermanentAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.at_trash_has_been_deleted_permanently_successfully'));
    }

    public function getCreatedBies()
    {
        $created_by_id = BuyAdvertisement::groupBy('created_by_id')->pluck('created_by_id');

        return User::whereIn('id', $created_by_id)->active()->orderBy('name')->get();
    }

    public function getUpdatedBies()
    {
        $updated_by_id = BuyAdvertisement::groupBy('updated_by_id')->pluck('updated_by_id');

        return User::whereIn('id', $updated_by_id)->active()->orderBy('name')->get();
    }

    public function getDeletedBies()
    {
        $deleted_by_id = BuyAdvertisement::groupBy('deleted_by_id')->pluck('deleted_by_id');

        return User::whereIn('id', $deleted_by_id)->active()->orderBy('name')->get();
    }

    public function getAdvertisementProviders()
    {
        return AdvertisementProvider::active()->orderBy('name')->get();
    }

    public function getBanks()
    {
        return Bank::active()->orderBy('name')->get();
    }

    public function getBuyAdvertisements($paginate = true)
    {
        if (in_array($this->pageType, ['index', 'trash'])) {
            $buyAdvertisements = BuyAdvertisement::with('createdBy', 'updatedBy', 'deletedBy', 'advertisementProvider', 'bank')
                ->when($this->advertisement_provider_id, fn ($q) => $q->where('advertisement_provider_id', $this->advertisement_provider_id))
                ->when($this->bank_id, fn ($q) => $q->where('bank_id', $this->bank_id))
                ->when($this->account_number, fn ($q) => $q->where('account_number', 'LIKE', "%{$this->account_number}%"))
                ->when($this->account_name, fn ($q) => $q->where('account_name', 'LIKE', "%{$this->account_name}%"))
                ->when($this->amount, fn ($q) => $q->where('amount', 'LIKE', "%{$this->amount}%"))
                ->when($this->date, fn ($q) => $q->whereDate('datetime', $this->date))
                ->when($this->time, fn ($q) => $q->whereTime('datetime', $this->time))
                ->when($this->notes, fn ($q) => $q->where('notes', 'LIKE', "%{$this->notes}%"))

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
                $buyAdvertisements->leftJoin('users', 'users.id', "{$this->pageTable}.created_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $buyAdvertisements->leftJoin('users', 'users.id', "{$this->pageTable}.updated_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $buyAdvertisements->leftJoin('users', 'users.id', "{$this->pageTable}.deleted_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } else {
                $buyAdvertisements->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->pageType == 'trash') {
                $buyAdvertisements->onlyTrashed();
            }

            if ($paginate) {
                return $buyAdvertisements->paginate($this->per_page ?? 10);
            } else {
                return $buyAdvertisements->get();
            }
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel', 'exportToExcel', "{$this->pageName} Export To Excel");

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new BuyAdvertisementExport($this->getBuyAdvertisements(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf', 'exportToPdf', "{$this->pageName} Export To PDF");

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.pdf", [
            'buyAdvertisements' => $this->getBuyAdvertisements(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function render()
    {
        $this->totalAmountToday = BuyAdvertisement::whereDate('datetime', now())->active()->sum('amount');
        $this->totalAmountYesterday = BuyAdvertisement::whereDate('datetime', now()->subDay())->active()->sum('amount');
        $this->percentageToday = $this->totalAmountToday && $this->totalAmountYesterday ? (($this->totalAmountToday - $this->totalAmountYesterday) / $this->totalAmountYesterday) * 100 : 0;

        $this->totalAmountMonth = BuyAdvertisement::whereMonth('datetime', now()->format('m'))
            ->whereYear('datetime', now()->format('Y'))->active()->sum('amount');
        $this->totalAmountLastMonth = BuyAdvertisement::whereMonth('datetime', now()->subMonth()->format('m'))
            ->whereYear('datetime', now()->format('Y'))->active()->sum('amount');
        $this->percentageMonth = $this->totalAmountMonth && $this->totalAmountLastMonth ? (($this->totalAmountMonth - $this->totalAmountLastMonth) / $this->totalAmountLastMonth) * 100 : 0;

        $this->totalAmountYear = BuyAdvertisement::whereYear('datetime', now()->format('Y'))->active()->sum('amount');
        $this->totalAmountLastYear = BuyAdvertisement::whereYear('datetime', now()->subYear()->format('Y'))->active()->sum('amount');
        $this->percentageYear = $this->totalAmountYear && $this->totalAmountLastYear ? (($this->totalAmountYear - $this->totalAmountLastYear) / $this->totalAmountLastYear) * 100 : 0;

        $this->totalAmountAll = BuyAdvertisement::active()->sum('amount');
        $this->percentageNewData = $this->totalAmountYear && $this->totalAmountLastYear ? (($this->totalAmountYear - $this->totalAmountLastYear) / $this->totalAmountLastYear) * 100 : 0;

        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.index", [
            'createdBies' => $this->readyToLoad ? $this->getCreatedBies() : collect(),
            'updatedBies' => $this->readyToLoad ? $this->getUpdatedBies() : collect(),
            'deletedBies' => $this->readyToLoad ? $this->getDeletedBies() : collect(),
            'advertisementProviders' => $this->readyToLoad ? $this->getAdvertisementProviders() : collect(),
            'banks' => $this->readyToLoad ? $this->getBanks() : collect(),
            'buyAdvertisements' => $this->readyToLoad ? $this->getBuyAdvertisements() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

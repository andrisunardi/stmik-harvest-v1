<?php

namespace App\Http\Livewire\CMS\Marketing;

use App\Enums\OrderStatus;
use App\Enums\OrderType;
use App\Exports\Marketing\OrderExport;
use App\Http\Livewire\CMS\Component;
use App\Models\Order;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class OrderComponent extends Component
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
        $this->pageName = 'Order';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-shopping';
        $this->pageTable = Str::plural(Str::snake($this->pageName));
        $this->pageCategoryName = 'Marketing';
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

    public $order;

    public $code;

    public $status = '';

    public $type = '';

    public $name;

    public $line;

    public $whatsapp;

    public $email;

    public $social_media;

    public $other;

    public $address;

    public $reference;

    public $domain;

    public $price;

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
        'status' => ['except' => ''],
        'type' => ['except' => ''],
        'name' => ['except' => ''],
        'line' => ['except' => ''],
        'whatsapp' => ['except' => ''],
        'email' => ['except' => ''],
        'social_media' => ['except' => ''],
        'other' => ['except' => ''],
        'address' => ['except' => ''],
        'reference' => ['except' => ''],
        'domain' => ['except' => ''],
        'price' => ['except' => ''],
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
            'order',
            'code',
            'status',
            'type',
            'name',
            'line',
            'whatsapp',
            'email',
            'social_media',
            'other',
            'address',
            'reference',
            'domain',
            'price',
            'image',
            'video',
            'date',
            'time',
            'notes',
            'is_active',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function resetForm()
    {
        if ($this->order) {
            $this->status = $this->status ?: $this->order->status;
            $this->type = $this->type ?: $this->order->type;
            $this->name = $this->name ?: $this->order->name;
            $this->line = $this->line ?: $this->order->line;
            $this->whatsapp = $this->whatsapp ?: $this->order->whatsapp;
            $this->email = $this->email ?: $this->order->email;
            $this->social_media = $this->social_media ?: $this->order->social_media;
            $this->other = $this->other ?: $this->order->other;
            $this->address = $this->address ?: $this->order->address;
            $this->reference = $this->reference ?: $this->order->reference;
            $this->domain = $this->domain ?: $this->order->domain;
            $this->price = $this->price ?: $this->order->price;
            $this->date = $this->date ?: $this->order->datetime?->format('Y-m-d');
            $this->time = $this->time ?: $this->order->datetime?->format('H:i');
            $this->notes = $this->notes ?: $this->order->notes;
            $this->is_active = $this->is_active ?: $this->order->is_active;
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
                $this->order = Order::withTrashed()->findOrFail($this->row);
            } else {
                $this->order = Order::findOrFail($this->row);
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

        $this->order = Order::find($id);

        if (! $this->order) {
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

        $this->order = Order::find($id);

        if (! $this->order) {
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

        $this->order = Order::withTrashed()->find($id);

        if (! $this->order) {
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
        $id = $this->pageType == 'edit' ? $this->order->id : null;

        return [
            'status' => ['required', Rule::in(1, 2, 3)],
            'type' => ['required', Rule::in(1, 2, 3)],
            'name' => "required|max:50|unique:{$this->pageTable},name,{$id}",
            'line' => 'nullable|max:20',
            'whatsapp' => 'nullable|max:20',
            'email' => "required|max:50|email:rfc,dns|regex:/^\S*$/u",
            'social_media' => 'nullable|max:50',
            'other' => 'nullable|max:50',
            'address' => 'nullable|max:1000',
            'reference' => 'nullable|max:20',
            'domain' => 'nullable|max:50',
            'price' => 'required|min:0|max:4294967295|integer|numeric',
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
            (new OrderService())->add($this->validate());
        }

        if ($this->pageType == 'clone') {
            $action = 'cloned';
            (new OrderService())->clone($this->validate(), $this->order);
        }

        if ($this->pageType == 'edit') {
            $action = 'edited';
            (new OrderService())->edit($this->order, $this->validate());
        }

        $this->index();

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_{$action}_successfully"));
    }

    public function active($id)
    {
        $this->checkPermission('edit', 'edit', "{$this->pageName} Edit");

        $order = Order::find($id);

        if (! $order) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new OrderService())->active($order);

        $active = Str::slug(Str::active($order->is_active), '_');

        $this->alert('success', "{$this->pageName} ".trans("index.has_been_set_{$active}_successfully"));
    }

    public function delete($id)
    {
        $this->checkPermission('delete', 'delete', "{$this->pageName} Delete");

        $order = Order::find($id);

        if (! $order) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new OrderService())->delete($order);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->checkPermission('restore', 'restore', "{$this->pageName} Restore");

        $order = Order::onlyTrashed()->find($id);

        if (! $order) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new OrderService())->restore($order);

        $this->alert('success', "{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->checkPermission('deletePermanent', 'deletePermanent', "{$this->pageName} Delete Permanent");

        $order = Order::onlyTrashed()->find($id);

        if (! $order) {
            return $this->alert('error', "{$this->pageName} ".trans('index.not_found_or_has_been_deleted'));
        }

        (new OrderService())->deletePermanent($order);

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

        (new OrderService())->restoreAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll(array $ids = [])
    {
        $this->checkPermission('deletePermanent', 'deletePermanent', "{$this->pageName} Delete Permanent");

        (new OrderService())->deletePermanentAll($ids);

        $this->alert('success', trans('index.all').' '."{$this->pageName} ".trans('index.at_trash_has_been_deleted_permanently_successfully'));
    }

    public function getOrderStatuses()
    {
        return OrderStatus::cases();
    }

    public function getOrderTypes()
    {
        return OrderType::cases();
    }

    public function getCreatedBies()
    {
        $created_by_id = Order::groupBy('created_by_id')->pluck('created_by_id');

        return User::whereIn('id', $created_by_id)->active()->orderBy('name')->get();
    }

    public function getUpdatedBies()
    {
        $updated_by_id = Order::groupBy('updated_by_id')->pluck('updated_by_id');

        return User::whereIn('id', $updated_by_id)->active()->orderBy('name')->get();
    }

    public function getDeletedBies()
    {
        $deleted_by_id = Order::groupBy('deleted_by_id')->pluck('deleted_by_id');

        return User::whereIn('id', $deleted_by_id)->active()->orderBy('name')->get();
    }

    public function getOrders($paginate = true)
    {
        if (in_array($this->pageType, ['index', 'trash'])) {
            $orders = Order::with('createdBy', 'updatedBy', 'deletedBy')
                ->when($this->code, fn ($q) => $q->where('code', 'LIKE', "%{$this->code}%"))
                ->when($this->status, fn ($q) => $q->where('status', $this->status))
                ->when($this->type, fn ($q) => $q->where('type', $this->type))
                ->when($this->name, fn ($q) => $q->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->line, fn ($q) => $q->where('line', 'LIKE', "%{$this->line}%"))
                ->when($this->whatsapp, fn ($q) => $q->where('whatsapp', 'LIKE', "%{$this->whatsapp}%"))
                ->when($this->email, fn ($q) => $q->where('email', 'LIKE', "%{$this->email}%"))
                ->when($this->social_media, fn ($q) => $q->where('social_media', 'LIKE', "%{$this->social_media}%"))
                ->when($this->other, fn ($q) => $q->where('other', 'LIKE', "%{$this->other}%"))
                ->when($this->address, fn ($q) => $q->where('address', 'LIKE', "%{$this->address}%"))
                ->when($this->reference, fn ($q) => $q->where('reference', 'LIKE', "%{$this->reference}%"))
                ->when($this->domain, fn ($q) => $q->where('domain', 'LIKE', "%{$this->domain}%"))
                ->when($this->price, fn ($q) => $q->where('price', 'LIKE', "%{$this->price}%"))
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
                $orders->leftJoin('users', 'users.id', "{$this->pageTable}.created_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $orders->leftJoin('users', 'users.id', "{$this->pageTable}.updated_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $orders->leftJoin('users', 'users.id', "{$this->pageTable}.deleted_by_id")
                    ->select("{$this->pageTable}.*", 'users.name as user_name')
                    ->orderByRaw("user_name {$this->sort_by}");
            } else {
                $orders->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->pageType == 'trash') {
                $orders->onlyTrashed();
            }

            if ($paginate) {
                return $orders->paginate($this->per_page ?? 10);
            } else {
                return $orders->get();
            }
        }
    }

    public function exportToExcel()
    {
        $this->checkPermission('exportToExcel', 'exportToExcel', "{$this->pageName} Export To Excel");

        $this->alert('info', trans('index.export_to_excel'));

        return Excel::download(new OrderExport($this->getOrders(paginate: false)), "{$this->pageName}.xlsx");
    }

    public function exportToPdf()
    {
        $this->checkPermission('exportToPdf', 'exportToPdf', "{$this->pageName} Export To PDF");

        $this->alert('info', trans('index.export_to_pdf'));

        $pdf = PDF::loadView("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.pdf", [
            'orders' => $this->getOrders(paginate: false),
            'title' => $this->pageName,
        ])->output();

        return response()->streamDownload(fn () => print($pdf), "{$this->pageName}.pdf");
    }

    public function getSummary()
    {
        $today = Order::whereDate('datetime', now());
        $yesterday = Order::whereDate('datetime', now()->subDay());

        $month = Order::whereMonth('datetime', now()->format('m'))->whereYear('datetime', now()->format('Y'));
        $lastMonth = Order::whereMonth('datetime', now()->subMonth()->format('m'))->whereYear('datetime', now()->subMonth()->format('Y'));

        $year = Order::whereYear('datetime', now()->format('Y'));
        $lastYear = Order::whereYear('datetime', now()->subYear()->format('Y'));

        $all = Order::query();
        $beforeThisYear = Order::whereYear('datetime', '<', now()->format('Y'));

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
            'orderStatuses' => $this->readyToLoad ? $this->getOrderStatuses() : collect(),
            'orderTypes' => $this->readyToLoad ? $this->getOrderTypes() : collect(),
            'orders' => $this->readyToLoad ? $this->getOrders() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}

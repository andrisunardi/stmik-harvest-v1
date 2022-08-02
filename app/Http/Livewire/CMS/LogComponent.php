<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LogComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = 'Log';

    public $menu_icon = 'bi bi-clock-history';

    public $menu_slug = 'log';

    public $menu_table = 'log';

    public $menu_type = 'index';

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

    public $active = '';

    public $row;

    public $checkbox_all;

    public $checkbox_id;

    public $log;

    public $admin = '';

    public $menu = '';

    public $row_menu;

    public $activity = '';

    public $queryString = [
        'menu_type' => ['except' => 'index'],
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
        'active' => ['except' => ''],
        'row' => ['except' => ''],

        'admin' => ['except' => ''],
        'menu' => ['except' => ''],
        'row_menu' => ['except' => ''],
        'activity' => ['except' => ''],
    ];

    public function resetFilter()
    {
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
            'active',
            'row',
        ]);

        $this->reset([
            'log',
            'admin',
            'menu',
            'row_menu',
            'activity',
        ]);
    }

    public function resetForm()
    {
        if ($this->log) {
            $this->active = $this->log->active;
            $this->admin = $this->log->admin?->id;
            $this->menu = $this->log->menu?->id;
            $this->row_menu = $this->log->row;
            $this->activity = $this->log->activity;
        }
    }

    public function refresh()
    {
        $this->resetErrorBag();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if ($this->menu_type != 'index' && $this->menu_type != 'trash') {
            $this->validateOnly($propertyName);
        }
    }

    public function mount()
    {
        if (
            $this->menu_type != 'index' &&
            $this->menu_type != 'add' &&
            $this->menu_type != 'clone' &&
            $this->menu_type != 'edit' &&
            $this->menu_type != 'view' &&
            $this->menu_type != 'trash'
        ) {
            Session::flash('danger', trans('index.Menu Type').' '.trans('message.not found or has been deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->log = Log::withTrashed()->find($this->row);
            } else {
                $this->log = Log::find($this->row);
            }

            if (! $this->log) {
                Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));

                return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
            }

            if ($this->menu_type != 'view') {
                $this->resetForm();
            }
        }
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function form($menu_type, $id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->active = true;

        if ($menu_type != 'add' && $id) {
            $this->log = Log::find($id);

            if (! $this->log) {
                return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
            }

            $this->resetForm();
        }

        $this->menu_type = $menu_type;
        $this->row = $id;
    }

    public function view($id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'view';
        $this->row = $id;

        $this->log = Log::withTrashed()->find($id);

        if (! $this->log) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }
    }

    public function trash()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'trash';
    }

    public function rules()
    {
        return [
            'active' => 'required',
            'admin' => 'required|exists:admin,id',
            'menu' => 'required|exists:menu,id',
            'row_menu' => 'required|numeric|min:0|max:999999999',
            'activity' => 'required',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->log = new Log();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->log->active = $this->active;

        $this->log->admin_id = $this->admin;
        $this->log->menu_id = $this->menu;
        $this->log->row = $this->row_menu;
        $this->log->activity = $this->activity;
        $this->log->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("page.{$this->menu_name}").' '.trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->log = Log::find($id);

        if (! $this->log) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->log->active = true;
        $this->log->save();
        $this->log->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->log = Log::find($id);

        if (! $this->log) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->log->active = false;
        $this->log->save();
        $this->log->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->log = Log::find($id);

        if (! $this->log) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->log->delete();
        $this->log->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->log = Log::onlyTrashed()->find($id);

        if (! $this->log) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->log->restore();
        $this->log->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->log = Log::onlyTrashed()->find($id);

        if (! $this->log) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->log->forceDelete();
        $this->log->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Log::onlyTrashed()->restore();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Log::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('message.All')." {$this->menu_name} ".trans('message.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Admin::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Admin::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Admin::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataAdmin()
    {
        return Admin::active()->orderBy('name')->get();
    }

    public function getDataMenu()
    {
        return Menu::active()->orderBy('name')->get();
    }

    public function getDataLog()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_log = Log::query()
                ->when($this->created_by_id, function ($query) {
                    $query->where('created_by_id', $this->created_by_id);
                })
                ->when($this->updated_by_id, function ($query) {
                    $query->where('updated_by_id', $this->updated_by_id);
                })
                ->when($this->deleted_by_id, function ($query) {
                    $query->where('deleted_by_id', $this->deleted_by_id);
                })
                ->when($this->start_created_at, function ($query) {
                    $query->whereDate('created_at', '>=', $this->start_created_at);
                })
                ->when($this->end_created_at, function ($query) {
                    $query->whereDate('created_at', '<=', $this->end_created_at);
                })
                ->when($this->start_updated_at, function ($query) {
                    $query->whereDate('updated_at', '>=', $this->start_updated_at);
                })
                ->when($this->end_updated_at, function ($query) {
                    $query->whereDate('updated_at', '<=', $this->end_updated_at);
                })
                ->when($this->start_deleted_at, function ($query) {
                    $query->whereDate('deleted_at', '>=', $this->start_deleted_at);
                })
                ->when($this->end_deleted_at, function ($query) {
                    $query->whereDate('deleted_at', '<=', $this->end_deleted_at);
                })
                ->when($this->active, function ($query) {
                    $query->where('active', $this->active);
                })

                ->when($this->admin, function ($query) {
                    $query->where('admin_id', $this->admin);
                })
                ->when($this->menu, function ($query) {
                    $query->where('menu_id', $this->menu);
                })
                ->when($this->row, function ($query) {
                    $query->where('row', 'LIKE', "%{$this->row}%");
                })
                ->when($this->activity, function ($query) {
                    $query->where('activity', 'LIKE', "%{$this->activity}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_log->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_log->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_log->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_log->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_log->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_log->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_log->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'admin_id') {
                $data_log->join('admin', 'admin.id', "{$this->menu_table}.admin_id")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'menu_id') {
                $data_log->join('menu', 'menu.id', "{$this->menu_table}.menu_id")
                        ->select("{$this->menu_table}.*", 'menu.name as menu_name')
                        ->orderByRaw("menu_name {$this->sort_by}");
            } else {
                $data_log->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_log->onlyTrashed();
            }

            return $data_log->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_admin' => $this->getDataAdmin(),
            'data_menu' => $this->getDataMenu(),
            'data_log' => $this->getDataLog(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Role';

    public $menu_icon = 'bi bi-key';

    public $menu_slug = 'role';

    public $menu_table = 'role';

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

    public $role;

    public $name;

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

        'name' => ['except' => ''],
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
            'role',
            'name',
        ]);
    }

    public function resetForm()
    {
        if ($this->role) {
            $this->active = $this->role->active;
            $this->name = $this->role->name;
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
            Session::flash('danger', trans('index.Menu Type').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->role = Role::withTrashed()->find($this->row);
            } else {
                $this->role = Role::find($this->row);
            }

            if (! $this->role) {
                Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));

                return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
            }

            $this->active = $this->role->active;

            $this->name = $this->role->name;
        }
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function add()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'add';
        $this->active = true;
    }

    public function clone($id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'clone';
        $this->row = $id;

        $this->role = Role::find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->active = $this->role->active;

        $this->name = $this->role->name;
    }

    public function edit($id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'edit';
        $this->row = $id;

        $this->role = Role::find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->active = $this->role->active;

        $this->name = $this->role->name;
    }

    public function view($id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'view';
        $this->row = $id;

        $this->role = Role::withTrashed()->find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
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
        $id = $this->menu_type == 'edit' ? $this->role->id : null;

        return [
            'active' => 'required',
            'name' => "required|max:50|unique:{$this->menu_table},name,{$id}",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->role = new Role();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->role->active = $this->active;

        $this->role->name = $this->name;
        $this->role->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->role = Role::find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->role->active = true;
        $this->role->save();
        $this->role->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->role = Role::find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->role->active = false;
        $this->role->save();
        $this->role->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->role = Role::find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->role->delete();
        $this->role->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->role = Role::onlyTrashed()->find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->role->restore();
        $this->role->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->role = Role::onlyTrashed()->find($id);

        if (! $this->role) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->role->forceDelete();
        $this->role->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Role::onlyTrashed()->restore();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Role::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.All')." {$this->menu_name} ".trans('index.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Role::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Role::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Role::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataRole()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_role = Role::query()
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
                    $query->where('active', $this->active == 2 ? 0 : $this->active);
                })

                ->when($this->name, function ($query) {
                    $query->where('name', 'LIKE', "%{$this->name}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_role->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_role->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_role->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_role->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_role->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_role->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_role->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_role->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_role->onlyTrashed();
            }

            return $data_role->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_role' => $this->getDataRole(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

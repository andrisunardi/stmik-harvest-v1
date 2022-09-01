<?php

namespace App\Http\Livewire\CMS;

use App\Models\Access;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class AccessComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Access';

    public $menu_icon = 'bi bi-key';

    public $menu_slug = 'access';

    public $menu_table = 'access';

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

    public $row;

    public $checkbox_all;

    public $checkbox_id;

    public $name;

    public $active = '';

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
        'row' => ['except' => ''],

        'name' => ['except' => ''],
        'active' => ['except' => ''],
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
            'row',
        ]);

        $this->reset([
            'name',
            'active',
        ]);
    }

    public function resetForm()
    {
        if ($this->access) {
            $this->name = $this->access->name;
            $this->active = $this->access->active;
        }
    }

    public function refresh()
    {
        $this->resetValidation();
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
            Session::flash('danger', trans('index.menu_type').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->access = Access::withTrashed()->find($this->row);
            } else {
                $this->access = Access::find($this->row);
            }

            if (! $this->access) {
                Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));

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
        $this->resetValidation();

        $this->menu_type = 'index';
    }

    public function form($menu_type, $id)
    {
        $this->resetFilter();
        $this->resetValidation();

        $this->active = true;

        if ($menu_type != 'add' && $id) {
            $this->access = Access::find($id);

            if (! $this->access) {
                return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
            }

            $this->resetForm();
        }

        $this->menu_type = $menu_type;
        $this->row = $id;
    }

    public function view($id)
    {
        $this->resetFilter();
        $this->resetValidation();

        $this->menu_type = 'view';
        $this->row = $id;

        $this->access = Access::withTrashed()->find($id);

        if (! $this->access) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }
    }

    public function trash()
    {
        $this->resetFilter();
        $this->resetValidation();

        $this->menu_type = 'trash';
    }

    public function rules()
    {
        $id = $this->menu_type == 'edit' ? $this->access->id : null;

        return [
            'name' => "required|max:50|unique:{$this->menu_table},name,{$id}",
            'active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->access = new Access();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->access->name = $this->name;
        $this->access->active = $this->active;
        $this->access->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetValidation();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->access = Access::find($id);

        if (! $this->access) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->access->active = ! $this->access->active;
        $this->access->save();
        $this->access->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_set_active_successfully'));
    }

    public function delete($id)
    {
        $this->access = Access::find($id);

        if (! $this->access) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->access->delete();
        $this->access->refresh();

        return Session::flash('success', trans('index.has_been', ['name' => trans('index.'.Str::slug($this->menu_name, '_')), 'result' => trans('index.deleted'), 'action' => trans('index.successfully')]));
    }

    public function restore($id)
    {
        $this->access = Access::onlyTrashed()->find($id);

        if (! $this->access) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->access->restore();
        $this->access->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_deleted_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->access = Access::onlyTrashed()->find($id);

        if (! $this->access) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->access->forceDelete();
        $this->access->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetValidation();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_deleted_permanent_successfully'));
    }

    public function restoreAll()
    {
        Access::onlyTrashed()->restore();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll()
    {
        Access::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.all')." {$this->menu_name} ".trans('index.at_trash has_been_deleted_permanent_successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Access::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Access::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Access::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataAccess()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_access = Access::query()
                ->when($this->name, fn ($query) => $query->where('name', 'LIKE', "%{$this->name}%"))
                ->when($this->active, fn ($query) => $query->where('active', $this->active))

                ->when($this->created_by_id, fn ($query) => $query->where('created_by_id', $this->created_by_id))
                ->when($this->updated_by_id, fn ($query) => $query->where('updated_by_id', $this->updated_by_id))
                ->when($this->deleted_by_id, fn ($query) => $query->where('deleted_by_id', $this->deleted_by_id))
                ->when($this->start_created_at, fn ($query) => $query->whereDate('created_at', '>=', $this->start_created_at))
                ->when($this->end_created_at, fn ($query) => $query->whereDate('created_at', '<=', $this->end_created_at))
                ->when($this->start_updated_at, fn ($query) => $query->whereDate('updated_at', '>=', $this->start_updated_at))
                ->when($this->end_updated_at, fn ($query) => $query->whereDate('updated_at', '<=', $this->end_updated_at))
                ->when($this->start_deleted_at, fn ($query) => $query->whereDate('deleted_at', '>=', $this->start_deleted_at))
                ->when($this->end_deleted_at, fn ($query) => $query->whereDate('deleted_at', '<=', $this->end_deleted_at));

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_access->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_access->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_access->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_access->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_access->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                    ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                    ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_access->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                    ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                    ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_access->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                    ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                    ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_access->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_access->onlyTrashed();
            }

            return $data_access->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_access' => $this->getDataAccess(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

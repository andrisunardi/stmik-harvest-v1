<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Value;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ValueComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Value';

    public $menu_icon = 'bi bi-trophy';

    public $menu_slug = 'value';

    public $menu_table = 'value';

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

    public $value;

    public $name;

    public $name_id;

    public $description;

    public $description_id;

    public $icon;

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
        'name_id' => ['except' => ''],
        'icon' => ['except' => ''],
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
            'value',
            'name',
            'name_id',
            'description',
            'description_id',
            'icon',
        ]);
    }

    public function resetForm()
    {
        if ($this->value) {
            $this->active = $this->value->active;
            $this->name = $this->value->name;
            $this->name_id = $this->value->name_id;
            $this->description = $this->value->description;
            $this->description_id = $this->value->description_id;
            $this->icon = $this->value->icon;
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
            Session::flash('danger', trans('index.Menu Type').' '.trans('index.not found or has been deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->value = Value::withTrashed()->find($this->row);
            } else {
                $this->value = Value::find($this->row);
            }

            if (! $this->value) {
                Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));

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
            $this->value = Value::find($id);

            if (! $this->value) {
                return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
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

        $this->value = Value::withTrashed()->find($id);

        if (! $this->value) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }
    }

    public function trash()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'trash';
    }

    protected function rules()
    {
        $id = $this->menu_type == 'edit' ? $this->value->id : null;

        return [
            'active' => 'required',
            'name' => "required|max:100|unique:{$this->menu_table},name,{$id}",
            'name_id' => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            'description' => 'nullable|max:65535',
            'description_id' => 'nullable|max:65535',
            'icon' => 'nullable|max:50',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->value = new Value();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->value->active = $this->active;

        $this->value->name = $this->name;
        $this->value->name_id = $this->name_id;
        $this->value->description = Str::of(htmlspecialchars($this->description))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->value->description_id = Str::of(htmlspecialchars($this->description_id))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->value->icon = $this->icon;
        $this->value->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("index.{$this->menu_name}").' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->value = Value::find($id);

        if (! $this->value) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->value->active = true;
        $this->value->save();
        $this->value->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->value = Value::find($id);

        if (! $this->value) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->value->active = false;
        $this->value->save();
        $this->value->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->value = Value::find($id);

        if (! $this->value) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->value->delete();
        $this->value->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->value = Value::onlyTrashed()->find($id);

        if (! $this->value) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->value->restore();
        $this->value->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->value = Value::onlyTrashed()->find($id);

        if (! $this->value) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->value->forceDelete();
        $this->value->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Value::onlyTrashed()->restore();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Value::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.All')." {$this->menu_name} ".trans('index.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Value::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Value::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Value::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataValue()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_value = Value::query()
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

                ->when($this->name, function ($query) {
                    $query->where('name', 'LIKE', "%{$this->name}%");
                })
                ->when($this->name_id, function ($query) {
                    $query->where('name_id', 'LIKE', "%{$this->name_id}%");
                })
                ->when($this->description, function ($query) {
                    $query->where('description', 'LIKE', "%{$this->description}%");
                })
                ->when($this->description_id, function ($query) {
                    $query->where('description_id', 'LIKE', "%{$this->description_id}%");
                })
                ->when($this->icon, function ($query) {
                    $query->where('icon', 'LIKE', "%{$this->icon}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_value->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_value->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_value->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_value->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_value->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_value->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_value->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_value->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_value->onlyTrashed();
            }

            return $data_value->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_value' => $this->getDataValue(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

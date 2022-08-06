<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class MenuComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Menu';

    public $menu_icon = 'bi bi-list';

    public $menu_slug = 'menu';

    public $menu_table = 'menu';

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

    public $menu;

    public $menu_category = '';

    public $name;

    public $name_id;

    public $icon;

    public $sort;

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

        'menu_category' => ['except' => ''],
        'name' => ['except' => ''],
        'name_id' => ['except' => ''],
        'icon' => ['except' => ''],
        'sort' => ['except' => ''],
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
            'menu',
            'menu_category',
            'name',
            'name_id',
            'icon',
            'sort',
            'image',
        ]);
    }

    public function resetForm()
    {
        if ($this->menu) {
            $this->active = $this->menu->active;
            $this->menu_category = $this->menu->menu_category?->id;
            $this->name = $this->menu->name;
            $this->name_id = $this->menu->name_id;
            $this->icon = $this->menu->icon;
            $this->sort = $this->menu->sort;
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
                $this->menu = Menu::withTrashed()->find($this->row);
            } else {
                $this->menu = Menu::find($this->row);
            }

            if (! $this->menu) {
                Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));

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
            $this->menu = Menu::find($id);

            if (! $this->menu) {
                return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
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

        $this->menu = Menu::withTrashed()->find($id);

        if (! $this->menu) {
            return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
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
        $id = $this->menu_type == 'edit' ? $this->menu->id : null;

        return [
            'active' => 'required',
            'menu_category' => 'required|exists:menu_category,id',
            'name' => "required|max:50|unique:{$this->menu_table},name,{$id}",
            'name_id' => "required|max:50|unique:{$this->menu_table},name_id,{$id}",
            'icon' => 'required|max:50',
            'sort' => 'required|numeric|min:0|max:999999999',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->menu = new Menu();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->menu->active = $this->active;

        $this->menu->menu_category_id = $this->menu_category;
        $this->menu->name = $this->name;
        $this->menu->name_id = $this->name_id;
        $this->menu->icon = $this->icon;
        $this->menu->sort = $this->sort;
        $this->menu->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->menu = Menu::find($id);

        if (! $this->menu) {
            return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
        }

        $this->menu->active = true;
        $this->menu->save();
        $this->menu->refresh();

        return Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->menu = Menu::find($id);

        if (! $this->menu) {
            return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
        }

        $this->menu->active = false;
        $this->menu->save();
        $this->menu->refresh();

        return Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->menu = Menu::find($id);

        if (! $this->menu) {
            return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
        }

        $this->menu->delete();
        $this->menu->refresh();

        return Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->menu = Menu::onlyTrashed()->find($id);

        if (! $this->menu) {
            return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
        }

        $this->menu->restore();
        $this->menu->refresh();

        return Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->menu = Menu::onlyTrashed()->find($id);

        if (! $this->menu) {
            return Session::flash('danger', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.not found or has been deleted'));
        }

        $this->menu->forceDelete();
        $this->menu->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Menu::onlyTrashed()->restore();

        return Session::flash('success', trans("index." . Str::slug($this->menu_name, "_")).' '.trans('index.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Menu::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.All')." {$this->menu_name} ".trans('index.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Menu::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Menu::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Menu::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataMenuCategory()
    {
        return MenuCategory::active()->orderBy('name')->get();
    }

    public function getDataMenu()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_menu = Menu::with('menu_category')
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

                ->when($this->menu_category, function ($query) {
                    $query->where('menu_category_id', $this->menu_category);
                })
                ->when($this->name, function ($query) {
                    $query->where('name', 'LIKE', "%{$this->name}%");
                })
                ->when($this->name_id, function ($query) {
                    $query->where('name_id', 'LIKE', "%{$this->name_id}%");
                })
                ->when($this->icon, function ($query) {
                    $query->where('icon', 'LIKE', "%{$this->icon}%");
                })
                ->when($this->sort, function ($query) {
                    $query->where('sort', 'LIKE', "%{$this->sort}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_menu->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_menu->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_menu->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_menu->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_menu->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_menu->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_menu->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == "{$this->menu_table}_category_id") {
                $data_menu->join("{$this->menu_table}_category", "{$this->menu_table}_category.id", "{$this->menu_table}.{$this->menu_table}_category_id")
                        ->select("{$this->menu_table}.*", "{$this->menu_table}_category.name as {$this->menu_table}_category_name")
                        ->orderByRaw("{$this->menu_table}_category_name {$this->sort_by}");
            } else {
                $data_menu->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_menu->onlyTrashed();
            }

            return $data_menu->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_menu_category' => $this->getDataMenuCategory(),
            'data_menu' => $this->getDataMenu(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

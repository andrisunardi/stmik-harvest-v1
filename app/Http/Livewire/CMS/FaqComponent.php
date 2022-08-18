<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Faq;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class FaqComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Faq';

    public $menu_icon = 'bi bi-question-circle';

    public $menu_slug = 'faq';

    public $menu_table = 'faq';

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

    public $faq;

    public $name;

    public $name_id;

    public $description;

    public $description_id;

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
            'faq',
            'name',
            'name_id',
            'description',
            'description_id',
        ]);
    }

    public function resetForm()
    {
        if ($this->faq) {
            $this->active = $this->faq->active;
            $this->name = $this->faq->name;
            $this->name_id = $this->faq->name_id;
            $this->description = $this->faq->description;
            $this->description_id = $this->faq->description_id;
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
            Session::flash('danger', trans('index.menu_type').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->faq = Faq::withTrashed()->find($this->row);
            } else {
                $this->faq = Faq::find($this->row);
            }

            if (! $this->faq) {
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
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function form($menu_type, $id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->active = true;

        if ($menu_type != 'add' && $id) {
            $this->faq = Faq::find($id);

            if (! $this->faq) {
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
        $this->resetErrorBag();

        $this->menu_type = 'view';
        $this->row = $id;

        $this->faq = Faq::withTrashed()->find($id);

        if (! $this->faq) {
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
        $id = $this->menu_type == 'edit' ? $this->faq->id : null;

        return [
            'active' => 'required|boolean',
            'name' => "required|max:100|unique:{$this->menu_table},name,{$id}",
            'name_id' => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            'description' => 'nullable|max:65535',
            'description_id' => 'nullable|max:65535',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->faq = new Faq();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->faq->active = $this->active;

        $this->faq->name = $this->name;
        $this->faq->name_id = $this->name_id;
        $this->faq->description = Str::of(htmlspecialchars($this->description))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->faq->description_id = Str::of(htmlspecialchars($this->description_id))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->faq->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->faq = Faq::find($id);

        if (! $this->faq) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->faq->active = true;
        $this->faq->save();
        $this->faq->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->faq = Faq::find($id);

        if (! $this->faq) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->faq->active = false;
        $this->faq->save();
        $this->faq->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->faq = Faq::find($id);

        if (! $this->faq) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->faq->delete();
        $this->faq->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->faq = Faq::onlyTrashed()->find($id);

        if (! $this->faq) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->faq->restore();
        $this->faq->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->faq = Faq::onlyTrashed()->find($id);

        if (! $this->faq) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->faq->forceDelete();
        $this->faq->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Faq::onlyTrashed()->restore();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Faq::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.All')." {$this->menu_name} ".trans('index.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Faq::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Faq::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Faq::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataFaq()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_faq = Faq::query()
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
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_faq->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_faq->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_faq->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_faq->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_faq->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_faq->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_faq->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_faq->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_faq->onlyTrashed();
            }

            return $data_faq->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_faq' => $this->getDataFaq(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

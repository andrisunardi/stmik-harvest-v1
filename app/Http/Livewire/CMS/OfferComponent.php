<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class OfferComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Offer';

    public $menu_icon = 'bi bi-gift';

    public $menu_slug = 'offer';

    public $menu_table = 'offer';

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

    public $offer;

    public $name;

    public $name_id;

    public $description;

    public $description_id;

    public $button_name;

    public $button_name_id;

    public $button_link;

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
        'button_name' => ['except' => ''],
        'button_name_id' => ['except' => ''],
        'button_link' => ['except' => ''],
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
            'offer',
            'name',
            'name_id',
            'description',
            'description_id',
            'button_name',
            'button_name_id',
            'button_link',
        ]);
    }

    public function resetForm()
    {
        if ($this->offer) {
            $this->active = $this->offer->active;
            $this->name = $this->offer->name;
            $this->name_id = $this->offer->name_id;
            $this->description = $this->offer->description;
            $this->description_id = $this->offer->description_id;
            $this->button_name = $this->offer->button_name;
            $this->button_name_id = $this->offer->button_name_id;
            $this->button_link = $this->offer->button_link;
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
                $this->offer = Offer::withTrashed()->find($this->row);
            } else {
                $this->offer = Offer::find($this->row);
            }

            if (! $this->offer) {
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
            $this->offer = Offer::find($id);

            if (! $this->offer) {
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

        $this->offer = Offer::withTrashed()->find($id);

        if (! $this->offer) {
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
        $id = $this->menu_type == 'edit' ? $this->offer->id : null;

        return [
            'active' => 'required|boolean',
            'name' => "required|max:100|unique:{$this->menu_table},name,{$id}",
            'name_id' => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            'description' => 'nullable|max:65535',
            'description_id' => 'nullable|max:65535',
            'button_name' => 'nullable|max:100',
            'button_name_id' => 'nullable|max:100',
            'button_link' => 'nullable|url|max:100',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->offer = new Offer();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->offer->active = $this->active;

        $this->offer->name = $this->name;
        $this->offer->name_id = $this->name_id;
        $this->offer->description = Str::of(htmlspecialchars($this->description))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->offer->description_id = Str::of(htmlspecialchars($this->description_id))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->offer->button_name = $this->button_name;
        $this->offer->button_name_id = $this->button_name_id;
        $this->offer->button_link = $this->button_link;
        $this->offer->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetValidation();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->offer = Offer::find($id);

        if (! $this->offer) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->offer->active = true;
        $this->offer->save();
        $this->offer->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_set_active_successfully'));
    }

    public function nonActive($id)
    {
        $this->offer = Offer::find($id);

        if (! $this->offer) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->offer->active = false;
        $this->offer->save();
        $this->offer->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->offer = Offer::find($id);

        if (! $this->offer) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->offer->delete();
        $this->offer->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_deleted_successfully'));
    }

    public function restore($id)
    {
        $this->offer = Offer::onlyTrashed()->find($id);

        if (! $this->offer) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->offer->restore();
        $this->offer->refresh();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_deleted_successfully'));
    }

    public function deletePermanent($id)
    {
        $this->offer = Offer::onlyTrashed()->find($id);

        if (! $this->offer) {
            return Session::flash('danger', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $this->offer->forceDelete();
        $this->offer->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetValidation();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_deleted_permanent_successfully'));
    }

    public function restoreAll()
    {
        Offer::onlyTrashed()->restore();

        return Session::flash('success', trans('index.'.Str::slug($this->menu_name, '_')).' '.trans('index.has_been_restored_successfully'));
    }

    public function deletePermanentAll()
    {
        Offer::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.all')." {$this->menu_name} ".trans('index.at_trash has_been_deleted_permanent_successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Offer::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Offer::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Offer::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataOffer()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_offer = Offer::query()
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
                ->when($this->button_name, function ($query) {
                    $query->where('button_name', 'LIKE', "%{$this->button_name}%");
                })
                ->when($this->button_name_id, function ($query) {
                    $query->where('button_name_id', 'LIKE', "%{$this->button_name_id}%");
                })
                ->when($this->button_link, function ($query) {
                    $query->where('button_link', 'LIKE', "%{$this->button_link}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_offer->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_offer->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_offer->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_offer->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_offer->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_offer->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_offer->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_offer->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_offer->onlyTrashed();
            }

            return $data_offer->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_offer' => $this->getDataOffer(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EventComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = 'Event';

    public $menu_icon = 'bi bi-calendar';

    public $menu_slug = 'event';

    public $menu_table = 'event';

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

    public $created_by = '';

    public $updated_by = '';

    public $deleted_by = '';

    public $active = '';

    public $row;

    public $checkbox_all;

    public $checkbox_id;

    public $event;

    public $event_category = '';

    public $name;

    public $name_id;

    public $description;

    public $description_id;

    public $location;

    public $start;

    public $end;

    public $tag;

    public $tag_id;

    public $image;

    public $queryString = [
        'menu_type' => ['except' => 'index'],
        'page' => ['except' => 1],
        'per_page' => ['except' => 10],
        'order_by' => ['except' => 'id'],
        'sort_by' => ['except' => 'desc'],
        'created_by' => ['except' => ''],
        'updated_by' => ['except' => ''],
        'deleted_by' => ['except' => ''],
        'start_created_at' => ['except' => ''],
        'end_created_at' => ['except' => ''],
        'start_updated_at' => ['except' => ''],
        'end_updated_at' => ['except' => ''],
        'start_deleted_at' => ['except' => ''],
        'end_deleted_at' => ['except' => ''],
        'active' => ['except' => ''],
        'row' => ['except' => ''],

        'event_category' => ['except' => ''],
        'name' => ['except' => ''],
        'name_id' => ['except' => ''],
        'description' => ['except' => ''],
        'description_id' => ['except' => ''],
        'location' => ['except' => ''],
        'start' => ['except' => ''],
        'end' => ['except' => ''],
        'tag' => ['except' => ''],
        'tag_id' => ['except' => ''],
    ];

    public function resetFilter()
    {
        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = 'id';
        $this->sort_by = 'desc';

        $this->reset([
            'created_by',
            'updated_by',
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
            'event',
            'event_category',
            'name',
            'name_id',
            'description',
            'description_id',
            'location',
            'start',
            'end',
            'tag',
            'tag_id',
            'image',
        ]);
    }

    public function resetForm()
    {
        if ($this->event) {
            $this->active = $this->event->active;
            $this->event_category = $this->event->event_category?->id;
            $this->name = $this->event->name;
            $this->name_id = $this->event->name_id;
            $this->description = $this->event->description;
            $this->description_id = $this->event->description_id;
            $this->location = $this->event->location;
            $this->start = $this->event->start;
            $this->end = $this->event->end;
            $this->tag = $this->event->tag;
            $this->tag_id = $this->event->tag_id;
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
            $this->start = now()->format('Y-m-d');
            $this->end = now()->format('Y-m-d');
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->event = Event::withTrashed()->find($this->row);
            } else {
                $this->event = Event::find($this->row);
            }

            if (! $this->event) {
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
        $this->date = now()->format('Y-m-d');

        if ($menu_type != 'add' && $id) {
            $this->event = Event::find($id);

            if (! $this->event) {
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

        $this->event = Event::withTrashed()->find($id);

        if (! $this->event) {
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
        $id = $this->menu_type == 'edit' ? $this->event->id : null;

        return [
            'active' => 'required',
            'event_category' => 'required|exists:event_category,id',
            'name' => "required|max:100|unique:{$this->menu_table},name,{$id}",
            'name_id' => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            'description' => 'nullable|max:65535',
            'description_id' => 'nullable|max:65535',
            'location' => 'nullable|max:100',
            'start' => 'nullable|max:10|max:10|date_format:Y-m-d',
            'end' => 'nullable|max:10|max:10|date_format:Y-m-d',
            'tag' => 'nullable|max:65535',
            'tag_id' => 'nullable|max:65535',
            'image' => 'nullable|image|max:1048576|mimes:jpg,jpeg,png,gif,webp',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            if ($this->menu_type == 'clone') {
                $image = $this->event->image;
            }
            $this->event = new Event();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->event->active = $this->active;

        $this->event->event_category_id = $this->event_category;
        $this->event->name = $this->name;
        $this->event->name_id = $this->name_id;
        $this->event->description = Str::of(htmlspecialchars($this->description))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->event->description_id = Str::of(htmlspecialchars($this->description_id))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->event->location = $this->location;
        $this->event->start = $this->start;
        $this->event->end = $this->end;
        $this->event->tag = $this->tag;
        $this->event->tag_id = $this->tag_id;

        if ($this->image) {
            if ($this->menu_type == 'edit') {
                $this->event->deleteImage();
            }

            $this->event->image = date('YmdHis').".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->event->image, 'images');
        } else {
            if ($this->menu_type == 'clone') {
                if ($image && File::exists(public_path("images/{$this->menu_slug}/{$image}"))) {
                    $this->event->image = date('YmdHis').'.'.explode('.', $image)[1];
                    File::copy(public_path("images/{$this->menu_slug}/{$image}"), public_path("images/{$this->menu_slug}/{$this->event->image}"));
                }
            }
        }

        $this->event->slug = Str::slug($this->name);
        $this->event->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("page.{$this->menu_name}").' '.trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->event = Event::find($id);

        if (! $this->event) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->event->active = true;
        $this->event->save();
        $this->event->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->event = Event::find($id);

        if (! $this->event) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->event->active = false;
        $this->event->save();
        $this->event->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->event = Event::find($id);

        if (! $this->event) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->event->delete();
        $this->event->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->event = Event::onlyTrashed()->find($id);

        if (! $this->event) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->event->restore();
        $this->event->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->event = Event::onlyTrashed()->find($id);

        if (! $this->event) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->event->deleteImage();
        $this->event->forceDelete();
        $this->event->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Event::onlyTrashed()->restore();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        $data_event = Event::onlyTrashed()->get();

        foreach ($data_event as $event) {
            $event->deleteImage();
            $event->forceDelete();
        }

        return Session::flash('success', trans('message.All')." {$this->menu_name} ".trans('message.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Event::groupBy('created_by')->active()->pluck('created_by');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Event::groupBy('updated_by')->active()->pluck('updated_by');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Event::groupBy('deleted_by')->active()->pluck('deleted_by');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataEventCategory()
    {
        return EventCategory::active()->orderBy('name')->get();
    }

    public function getDataEvent()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_event = Event::query()
                ->when($this->created_by, function ($query) {
                    $query->where('created_by', $this->created_by);
                })
                ->when($this->updated_by, function ($query) {
                    $query->where('updated_by', $this->updated_by);
                })
                ->when($this->deleted_by, function ($query) {
                    $query->where('deleted_by', $this->deleted_by);
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

                ->when($this->event_category, function ($query) {
                    $query->where('event_category_id', $this->event_category);
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
                ->when($this->location, function ($query) {
                    $query->where('location', 'LIKE', "%{$this->location}%");
                })
                ->when($this->start, function ($query) {
                    $query->where('start', $this->start);
                })
                ->when($this->end, function ($query) {
                    $query->where('end', $this->end);
                })
                ->when($this->tag, function ($query) {
                    $query->where('tag', 'LIKE', "%{$this->tag}%");
                })
                ->when($this->tag_id, function ($query) {
                    $query->where('tag_id', 'LIKE', "%{$this->tag_id}%");
                });

            if ($this->created_by || $this->created_by == '0') {
                $data_event->where('created_by', $this->created_by);
            }
            if ($this->updated_by || $this->updated_by == '0') {
                $data_event->where('updated_by', $this->updated_by);
            }
            if ($this->deleted_by || $this->deleted_by == '0') {
                $data_event->where('deleted_by', $this->deleted_by);
            }
            if ($this->active || $this->active == '0') {
                $data_event->where('active', $this->active);
            }

            if ($this->order_by == 'created_by') {
                $data_event->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by') {
                $data_event->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by') {
                $data_event->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == "{$this->menu_table}_category_id") {
                $data_event->join("{$this->menu_table}_category", "{$this->menu_table}_category.id", "{$this->menu_table}.{$this->menu_table}_category_id")
                        ->select("{$this->menu_table}.*", "{$this->menu_table}_category.name as {$this->menu_table}_category_name")
                        ->orderByRaw("{$this->menu_table}_category_name {$this->sort_by}");
            } else {
                $data_event->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_event->onlyTrashed();
            }

            return $data_event->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_event' => $this->getDataEvent(),
            'data_event_category' => $this->getDataEventCategory(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

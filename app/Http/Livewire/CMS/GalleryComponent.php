<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class GalleryComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = 'Gallery';

    public $menu_icon = 'bi bi-images';

    public $menu_slug = 'gallery';

    public $menu_table = 'gallery';

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

    public $gallery;

    public $category = '';

    public $name;

    public $name_id;

    public $description;

    public $description_id;

    public $image;

    public $video;

    public $youtube;

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

        'category' => ['except' => ''],
        'name' => ['except' => ''],
        'name_id' => ['except' => ''],
        'youtube' => ['except' => ''],
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
            'gallery',
            'category',
            'name',
            'name_id',
            'description',
            'description_id',
            'image',
            'video',
            'youtube',
        ]);
    }

    public function resetForm()
    {
        if ($this->gallery) {
            $this->active = $this->gallery->active;
            $this->category = $this->gallery->category;
            $this->name = $this->gallery->name;
            $this->name_id = $this->gallery->name_id;
            $this->description = $this->gallery->description;
            $this->description_id = $this->gallery->description_id;
            $this->youtube = $this->gallery->youtube;
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
                $this->gallery = Gallery::withTrashed()->find($this->row);
            } else {
                $this->gallery = Gallery::find($this->row);
            }

            if (! $this->gallery) {
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
            $this->gallery = Gallery::find($id);

            if (! $this->gallery) {
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

        $this->gallery = Gallery::withTrashed()->find($id);

        if (! $this->gallery) {
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
        $id = $this->menu_type == 'edit' ? $this->gallery->id : null;

        return [
            'active' => 'required',
            'category' => 'required',
            'name' => "required|max:100|unique:{$this->menu_table},name,{$id}",
            'name_id' => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            'description' => 'nullable|max:65535',
            'description_id' => 'nullable|max:65535',
            'image' => 'nullable|image|max:1048576|mimes:jpg,jpeg,png,gif,webp',
            'video' => 'nullable|file|max:1048576|mimes:mp4',
            'youtube' => 'nullable|url|max:200',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            if ($this->menu_type == 'clone') {
                $image = $this->gallery->image;
                $video = $this->gallery->video;
            }
            $this->gallery = new Gallery();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->gallery->active = $this->active;

        $this->gallery->category = $this->category;
        $this->gallery->name = $this->name;
        $this->gallery->name_id = $this->name_id;
        $this->gallery->description = Str::of(htmlspecialchars($this->description))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->gallery->description_id = Str::of(htmlspecialchars($this->description_id))->swap(['&lt;' => '<', '&gt;' => '>']);
        $this->gallery->youtube = $this->youtube;

        if ($this->image) {
            if ($this->menu_type == 'edit') {
                $this->gallery->deleteImage();
            }

            $this->gallery->image = date('YmdHis').".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->gallery->image, 'images');
        } else {
            if ($this->menu_type == 'clone') {
                if ($image && File::exists(public_path("images/{$this->menu_slug}/{$image}"))) {
                    $this->gallery->image = date('YmdHis').'.'.explode('.', $image)[1];
                    File::copy(public_path("images/{$this->menu_slug}/{$image}"), public_path("images/{$this->menu_slug}/{$this->gallery->image}"));
                }
            }
        }

        if ($this->video) {
            if ($this->menu_type == 'edit') {
                $this->gallery->deleteVideo();
            }

            $this->gallery->video = date('YmdHis').".{$this->video->getClientOriginalExtension()}";
            $this->video->storePubliclyAs($this->menu_slug, $this->gallery->video, 'videos');
        } else {
            if ($this->menu_type == 'clone') {
                if ($video && File::exists(public_path("videos/{$this->menu_slug}/{$video}"))) {
                    $this->gallery->video = date('YmdHis').'.'.explode('.', $video)[1];
                    File::copy(public_path("videos/{$this->menu_slug}/{$video}"), public_path("videos/{$this->menu_slug}/{$this->gallery->video}"));
                }
            }
        }

        $this->gallery->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("page.{$this->menu_name}").' '.trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->gallery = Gallery::find($id);

        if (! $this->gallery) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->gallery->active = true;
        $this->gallery->save();
        $this->gallery->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->gallery = Gallery::find($id);

        if (! $this->gallery) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->gallery->active = false;
        $this->gallery->save();
        $this->gallery->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->gallery = Gallery::find($id);

        if (! $this->gallery) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->gallery->delete();
        $this->gallery->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->gallery = Gallery::onlyTrashed()->find($id);

        if (! $this->gallery) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->gallery->restore();
        $this->gallery->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->gallery = Gallery::onlyTrashed()->find($id);

        if (! $this->gallery) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->gallery->deleteImage();
        $this->gallery->deleteVideo();
        $this->gallery->forceDelete();
        $this->gallery->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Gallery::onlyTrashed()->restore();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        $data_gallery = Gallery::onlyTrashed()->get();

        foreach ($data_gallery as $gallery) {
            $gallery->deleteImage();
            $gallery->deleteVideo();
            $gallery->forceDelete();
        }

        return Session::flash('success', trans('message.All')." {$this->menu_name} ".trans('message.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Gallery::groupBy('created_by')->active()->pluck('created_by');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Gallery::groupBy('updated_by')->active()->pluck('updated_by');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Gallery::groupBy('deleted_by')->active()->pluck('deleted_by');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataGallery()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_gallery = Gallery::query()
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

                ->when($this->category, function ($query) {
                    $query->where('category', $this->category);
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
                ->when($this->youtube, function ($query) {
                    $query->where('youtube', 'LIKE', "%{$this->youtube}%");
                });

            if ($this->created_by || $this->created_by == '0') {
                $data_gallery->where('created_by', $this->created_by);
            }
            if ($this->updated_by || $this->updated_by == '0') {
                $data_gallery->where('updated_by', $this->updated_by);
            }
            if ($this->deleted_by || $this->deleted_by == '0') {
                $data_gallery->where('deleted_by', $this->deleted_by);
            }
            if ($this->active || $this->active == '0') {
                $data_gallery->where('active', $this->active);
            }

            if ($this->order_by == 'created_by') {
                $data_gallery->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by') {
                $data_gallery->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by') {
                $data_gallery->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_gallery->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_gallery->onlyTrashed();
            }

            return $data_gallery->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_gallery' => $this->getDataGallery(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}

<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Slider;
use App\Models\Admin;

class SliderComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = "Slider";
    public $menu_icon = "bi bi-sliders";
    public $menu_slug = "slider";
    public $menu_table = "slider";
    public $menu_type = "index";

    public $page = 1;
    public $per_page = 10;
    public $order_by = "id";
    public $sort_by = "desc";
    public $start_created_at;
    public $end_created_at;
    public $start_updated_at;
    public $end_updated_at;
    public $start_deleted_at;
    public $end_deleted_at;
    public $created_by;
    public $updated_by;
    public $deleted_by;
    public $active;
    public $row;
    public $checkbox_all;
    public $checkbox_id;

    public $slider;
    public $name;
    public $name_id;
    public $description;
    public $description_id;
    public $button_name;
    public $button_name_id;
    public $button_link;
    public $image;

    public $queryString = [
        "menu_type" => ["except" => "index"],
        "page" => ["except" => 1],
        "per_page" => ["except" => 10],
        "order_by" => ["except" => "id"],
        "sort_by" => ["except" => "desc"],
        "created_by" => ["except" => ""],
        "updated_by" => ["except" => ""],
        "deleted_by" => ["except" => ""],
        "start_created_at" => ["except" => ""],
        "end_created_at" => ["except" => ""],
        "start_updated_at" => ["except" => ""],
        "end_updated_at" => ["except" => ""],
        "start_deleted_at" => ["except" => ""],
        "end_deleted_at" => ["except" => ""],
        "active" => ["except" => ""],
        "row" => ["except" => ""],

        "name" => ["except" => ""],
        "name_id" => ["except" => ""],
        "button_name" => ["except" => ""],
        "button_name_id" => ["except" => ""],
        "button_link" => ["except" => ""],
    ];

    public function resetFilter()
    {
        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = "id";
        $this->sort_by = "desc";

        $this->reset([
            "created_by",
            "updated_by",
            "start_created_at",
            "end_created_at",
            "start_updated_at",
            "end_updated_at",
            "start_deleted_at",
            "end_deleted_at",
            "active",
            "row",
        ]);

        $this->reset([
            "slider",
            "name",
            "name_id",
            "description",
            "description_id",
            "button_name",
            "button_name_id",
            "button_link",
            "image",
        ]);
    }

    public function resetForm()
    {
        if ($this->slider) {
            $this->active = $this->slider->active;
            $this->name = $this->slider->name;
            $this->name_id = $this->slider->name_id;
            $this->description = $this->slider->description;
            $this->description_id = $this->slider->description_id;
            $this->button_name = $this->slider->button_name;
            $this->button_name_id = $this->slider->button_name_id;
            $this->button_link = $this->slider->button_link;
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
        if ($this->menu_type != "index" && $this->menu_type != "trash") {
            $this->validateOnly($propertyName);
        }
    }

    public function mount()
    {
        if (
            $this->menu_type != "index" &&
            $this->menu_type != "add" &&
            $this->menu_type != "clone" &&
            $this->menu_type != "edit" &&
            $this->menu_type != "view" &&
            $this->menu_type != "trash"
        ) {
            Session::flash("danger", trans("index.Menu Type") . " " . trans("message.not found or has been deleted"));
            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == "add") {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != "index" || $this->menu_type != "trash")) {
            if ($this->menu_type == "view") {
                $this->slider = Slider::withTrashed()->find($this->row);
            } else {
                $this->slider = Slider::find($this->row);
            }

            if (!$this->slider) {
                Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
                return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
            }

            if ($this->menu_type != "view") {
                $this->resetForm();
            }
        }
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function form($menu_type, $id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->active = true;

        if ($menu_type != "add" && $id) {
            $this->slider = Slider::find($id);

            if (!$this->slider) {
                return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
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

        $this->menu_type = "view";
        $this->row = $id;

        $this->slider = Slider::withTrashed()->find($id);

        if (!$this->slider) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }
    }

    public function trash()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "trash";
    }

    public function rules()
    {
        $id = $this->menu_type == "edit" ? $this->slider->id : null;

        return [
            "active"            => "required",
            "name"              => "required|max:100|unique:{$this->menu_table},name,{$id}",
            "name_id"           => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            "description"       => "nullable|max:65535",
            "description_id"    => "nullable|max:65535",
            "button_name"       => "nullable|max:100",
            "button_name_id"    => "nullable|max:100",
            "button_link"       => "nullable|url|max:100",
            "image"             => "nullable|image|max:1048576|mimes:jpg,jpeg,png,gif,webp",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            if ($this->menu_type == "clone") {
                $image = $this->slider->image;
            }
            $this->slider = new Slider();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->slider->active = $this->active;

        $this->slider->name = $this->name;
        $this->slider->name_id = $this->name_id;
        $this->slider->description = Str::of(htmlspecialchars($this->description))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->slider->description_id = Str::of(htmlspecialchars($this->description_id))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->slider->button_name = $this->button_name;
        $this->slider->button_name_id = $this->button_name_id;
        $this->slider->button_link = $this->button_link;

        if ($this->image) {
            if ($this->menu_type == "edit") {
                $this->slider->deleteImage();
            }

            $this->slider->image = date("YmdHis") . ".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->slider->image, "images");
        } else {
            if ($this->menu_type == "clone") {
                if ($image && File::exists(public_path() . "/images/{$this->menu_slug}/{$image}")) {
                    $this->slider->image = date("YmdHis") . "." . explode(".", $image)[1];
                    File::copy(public_path() . "/images/{$this->menu_slug}/{$image}", public_path() . "/images/{$this->menu_slug}/{$this->slider->image}");
                }
            }
        }

        $this->slider->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->slider = Slider::find($id);

        if (!$this->slider) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->slider->active = true;
        $this->slider->save();
        $this->slider->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->slider = Slider::find($id);

        if (!$this->slider) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->slider->active = false;
        $this->slider->save();
        $this->slider->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->slider = Slider::find($id);

        if (!$this->slider) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->slider->delete();
        $this->slider->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->slider = Slider::onlyTrashed()->find($id);

        if (!$this->slider) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->slider->restore();
        $this->slider->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->slider = Slider::onlyTrashed()->find($id);

        if (!$this->slider) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->slider->deleteImage();
        $this->slider->forceDelete();
        $this->slider->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        Slider::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        $data_slider = Slider::onlyTrashed()->get();

        foreach ($data_slider as $slider) {
            $slider->deleteImage();
            $slider->forceDelete();
        }

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = Slider::groupBy("created_by")->active()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->active()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Slider::groupBy("updated_by")->active()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->active()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Slider::groupBy("deleted_by")->active()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->active()->orderBy("name")->get();
    }

    public function getDataSlider()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_slider = Slider::query()
                ->when($this->created_by, function ($query) {
                    $query->where("created_by", $this->created_by);
                })
                ->when($this->updated_by, function ($query) {
                    $query->where("updated_by", $this->updated_by);
                })
                ->when($this->deleted_by, function ($query) {
                    $query->where("deleted_by", $this->deleted_by);
                })
                ->when($this->start_created_at, function ($query) {
                    $query->whereDate("created_at", ">=", $this->start_created_at);
                })
                ->when($this->end_created_at, function ($query) {
                    $query->whereDate("created_at", "<=", $this->end_created_at);
                })
                ->when($this->start_updated_at, function ($query) {
                    $query->whereDate("updated_at", ">=", $this->start_updated_at);
                })
                ->when($this->end_updated_at, function ($query) {
                    $query->whereDate("updated_at", "<=", $this->end_updated_at);
                })
                ->when($this->start_deleted_at, function ($query) {
                    $query->whereDate("deleted_at", ">=", $this->start_deleted_at);
                })
                ->when($this->end_deleted_at, function ($query) {
                    $query->whereDate("deleted_at", "<=", $this->end_deleted_at);
                })
                ->when($this->active, function ($query) {
                    $query->where("active", $this->active);
                })

                ->when($this->name, function ($query) {
                    $query->where("name", "LIKE", "%{$this->name}%");
                })
                ->when($this->name_id, function ($query) {
                    $query->where("name_id", "LIKE", "%{$this->name_id}%");
                })
                ->when($this->description, function ($query) {
                    $query->where("description", "LIKE", "%{$this->description}%");
                })
                ->when($this->description_id, function ($query) {
                    $query->where("description_id", "LIKE", "%{$this->description_id}%");
                })
                ->when($this->button_name, function ($query) {
                    $query->where("button_name", "LIKE", "%{$this->button_name}%");
                })
                ->when($this->button_name_id, function ($query) {
                    $query->where("button_name_id", "LIKE", "%{$this->button_name_id}%");
                })
                ->when($this->button_link, function ($query) {
                    $query->where("button_link", "LIKE", "%{$this->button_link}%");
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_slider->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_slider->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_slider->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_slider->where("active", $this->active);
                }

                if ($this->order_by == "created_by") {
                    $data_slider->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_slider->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_slider->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else {
                    $data_slider->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_slider->onlyTrashed();
                }

                return $data_slider->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_slider" => $this->getDataSlider(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

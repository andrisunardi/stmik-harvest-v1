<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Network;
use App\Models\Admin;

class NetworkComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = "Network";
    public $menu_icon = "bi bi-sitemap";
    public $menu_slug = "network";
    public $menu_table = "network";
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

    public $network;
    public $name;
    public $description;
    public $link;
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
        "link" => ["except" => ""],
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
            "network",
            "name",
            "description",
            "link",
            "image",
        ]);
    }

    public function resetForm()
    {
        if ($this->network) {
            $this->active = $this->network->active;
            $this->name = $this->network->name;
            $this->description = $this->network->description;
            $this->link = $this->network->link;
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
                $this->network = Network::withTrashed()->find($this->row);
            } else {
                $this->network = Network::find($this->row);
            }

            if (!$this->network) {
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
            $this->network = Network::find($id);

            if (!$this->network) {
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

        $this->network = Network::withTrashed()->find($id);

        if (!$this->network) {
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
        $id = $this->menu_type == "edit" ? $this->network->id : null;

        return [
            "active"        => "required",
            "name"          => "required|max:100|unique:{$this->menu_table},name,{$id}",
            "description"   => "nullable|max:65535",
            "link"          => "nullable|url|max:200",
            "image"         => "nullable|image|max:102400|mimes:jpg,jpeg,png,gif,webp",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            if ($this->menu_type == "clone") {
                $image = $this->network->image;
            }
            $this->network = new Network();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->network->active = $this->active;

        $this->network->name = $this->name;
        $this->network->description = Str::of(htmlspecialchars($this->description))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->network->link = $this->link;

        if ($this->image) {
            if ($this->menu_type == "edit") {
                $this->network->deleteImage();
            }

            $this->network->image = date("YmdHis") . ".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->network->image, "images");
        } else {
            if ($this->menu_type == "clone") {
                if ($image && File::exists(public_path("images/{$this->menu_slug}/{$image}"))) {
                    $this->network->image = date("YmdHis") . "." . explode(".", $image)[1];
                    File::copy(public_path("images/{$this->menu_slug}/{$image}"), public_path("images/{$this->menu_slug}/{$this->network->image}"));
                }
            }
        }

        $this->network->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->network = Network::find($id);

        if (!$this->network) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->network->active = true;
        $this->network->save();
        $this->network->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->network = Network::find($id);

        if (!$this->network) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->network->active = false;
        $this->network->save();
        $this->network->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->network = Network::find($id);

        if (!$this->network) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->network->delete();
        $this->network->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->network = Network::onlyTrashed()->find($id);

        if (!$this->network) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->network->restore();
        $this->network->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->network = Network::onlyTrashed()->find($id);

        if (!$this->network) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->network->deleteImage();
        $this->network->forceDelete();
        $this->network->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        Network::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        $data_network = Network::onlyTrashed()->get();

        foreach ($data_network as $network) {
            $network->deleteImage();
            $network->forceDelete();
        }

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = Network::groupBy("created_by")->active()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->active()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Network::groupBy("updated_by")->active()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->active()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Network::groupBy("deleted_by")->active()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->active()->orderBy("name")->get();
    }

    public function getDataNetwork()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_network = Network::query()
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
                ->when($this->description, function ($query) {
                    $query->where("description", "LIKE", "%{$this->description}%");
                })
                ->when($this->link, function ($query) {
                    $query->where("link", "LIKE", "%{$this->link}%");
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_network->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_network->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_network->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_network->where("active", $this->active);
                }

                if ($this->order_by == "created_by") {
                    $data_network->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_network->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_network->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else {
                    $data_network->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_network->onlyTrashed();
                }

                return $data_network->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_network" => $this->getDataNetwork(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

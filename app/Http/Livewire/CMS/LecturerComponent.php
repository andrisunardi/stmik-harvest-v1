<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Lecturer;
use App\Models\Admin;

class LecturerComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = "Lecturer";
    public $menu_icon = "bi bi-person-badge";
    public $menu_slug = "lecturer";
    public $menu_table = "lecturer";
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

    public $lecturer;
    public $code;
    public $name;
    public $description;
    public $job;
    public $phone;
    public $email;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $scholar;
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

        "code" => ["except" => ""],
        "name" => ["except" => ""],
        "job" => ["except" => ""],
        "phone" => ["except" => ""],
        "email" => ["except" => ""],
        "facebook" => ["except" => ""],
        "twitter" => ["except" => ""],
        "instagram" => ["except" => ""],
        "linkedin" => ["except" => ""],
        "scholar" => ["except" => ""],
    ];

    public function refresh()
    {
        $this->resetErrorBag();
    }

    public function resetFilter()
    {
        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = "id";
        $this->sort_by = "desc";
        $this->created_by = null;
        $this->updated_by = null;
        $this->start_created_at = null;
        $this->end_created_at = null;
        $this->start_updated_at = null;
        $this->end_updated_at = null;
        $this->start_deleted_at = null;
        $this->end_deleted_at = null;
        $this->active = null;
        $this->row = null;

        $this->lecturer = null;
        $this->code = null;
        $this->name = null;
        $this->description = null;
        $this->job = null;
        $this->phone = null;
        $this->email = null;
        $this->facebook = null;
        $this->twitter = null;
        $this->instagram = null;
        $this->linkedin = null;
        $this->scholar = null;
        $this->image = null;
    }

    public function resetForm()
    {
        $this->active = $this->lecturer->active;
        $this->code = $this->lecturer->code;
        $this->name = $this->lecturer->name;
        $this->description = $this->lecturer->description;
        $this->job = $this->lecturer->job;
        $this->phone = $this->lecturer->phone;
        $this->email = $this->lecturer->email;
        $this->facebook = $this->lecturer->facebook;
        $this->twitter = $this->lecturer->twitter;
        $this->instagram = $this->lecturer->instagram;
        $this->linkedin = $this->lecturer->linkedin;
        $this->scholar = $this->lecturer->scholar;
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingOrderBy()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingCreatedBy()
    {
        $this->resetPage();
    }

    public function updatingUpdatedBy()
    {
        $this->resetPage();
    }

    public function updatingDeletedBy()
    {
        $this->resetPage();
    }

    public function updatingStartCreatedAt()
    {
        $this->resetPage();
    }

    public function updatingEndCreatedAt()
    {
        $this->resetPage();
    }

    public function updatingStartUpdatedAt()
    {
        $this->resetPage();
    }

    public function updatingEndUpdatedAt()
    {
        $this->resetPage();
    }

    public function updatingStartDeletedAt()
    {
        $this->resetPage();
    }

    public function updatingEndDeletedAt()
    {
        $this->resetPage();
    }

    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingCode()
    {
        $this->resetPage();
    }

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingDescription()
    {
        $this->resetPage();
    }

    public function updatingJob()
    {
        $this->resetPage();
    }

    public function updatingPhone()
    {
        $this->resetPage();
    }

    public function updatingEmail()
    {
        $this->resetPage();
    }

    public function updatingFacebook()
    {
        $this->resetPage();
    }

    public function updatingTwitter()
    {
        $this->resetPage();
    }

    public function updatingInstagram()
    {
        $this->resetPage();
    }

    public function updatingLinkedin()
    {
        $this->resetPage();
    }

    public function updatingScholar()
    {
        $this->resetPage();
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
            Session::flash("danger", trans("general.Menu Type") . " " . trans("message.not found or has been deleted"));
            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == "add") {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != "index" || $this->menu_type != "trash")) {
            if ($this->menu_type == "view") {
                $this->lecturer = Lecturer::withTrashed()->find($this->row);
            } else {
                $this->lecturer = Lecturer::find($this->row);
            }

            if (!$this->lecturer) {
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
            $this->lecturer = Lecturer::find($id);

            if (!$this->lecturer) {
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

        $this->lecturer = Lecturer::withTrashed()->find($id);

        if (!$this->lecturer) {
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
        $id = $this->menu_type == "edit" ? $this->lecturer->id : null;

        return [
            "active"        => "required",
            "code"          => "nullable|max:10|unique:{$this->menu_table},code,{$id}",
            "name"          => "required|max:100|unique:{$this->menu_table},name,{$id}",
            "description"   => "nullable|max:65535",
            "job"           => "nullable|max:100",
            "phone"         => "nullable|max:15",
            "email"         => "nullable|email|max:50|unique:{$this->menu_table},email,{$id}",
            "facebook"      => "nullable|url|max:100",
            "twitter"       => "nullable|url|max:100",
            "instagram"     => "nullable|url|max:100",
            "linkedin"      => "nullable|url|max:100",
            "scholar"       => "nullable|url|max:100",
            "image"         => "nullable|image|max:1048576|mimes:jpg,jpeg,png,gif,webp",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            if ($this->menu_type == "clone") {
                $image = $this->lecturer->image;
            }
            $this->lecturer = new Lecturer();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->lecturer->active = $this->active;

        $this->lecturer->code = $this->code;
        $this->lecturer->name = $this->name;
        $this->lecturer->description = Str::of(htmlspecialchars($this->description))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->lecturer->job = $this->job;
        $this->lecturer->phone = $this->phone;
        $this->lecturer->email = $this->email;
        $this->lecturer->facebook = $this->facebook;
        $this->lecturer->twitter = $this->twitter;
        $this->lecturer->instagram = $this->instagram;
        $this->lecturer->linkedin = $this->linkedin;
        $this->lecturer->scholar = $this->scholar;

        if ($this->image) {
            if ($this->menu_type == "edit") {
                $this->lecturer->deleteImage();
            }

            $this->lecturer->image = date("YmdHis") . ".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->lecturer->image, "images");
        } else {
            if ($this->menu_type == "clone") {
                if ($image && File::exists(public_path() . "/images/{$this->menu_slug}/{$image}")) {
                    $this->lecturer->image = date("YmdHis") . "." . explode(".", $image)[1];
                    File::copy(public_path() . "/images/{$this->menu_slug}/{$image}", public_path() . "/images/{$this->menu_slug}/{$this->lecturer->image}");
                }
            }
        }

        $this->lecturer->slug = Str::slug($this->name);
        $this->lecturer->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->lecturer = Lecturer::find($id);

        if (!$this->lecturer) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer->active = true;
        $this->lecturer->save();
        $this->lecturer->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->lecturer = Lecturer::find($id);

        if (!$this->lecturer) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer->active = false;
        $this->lecturer->save();
        $this->lecturer->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->lecturer = Lecturer::find($id);

        if (!$this->lecturer) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer->delete();
        $this->lecturer->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->lecturer = Lecturer::onlyTrashed()->find($id);

        if (!$this->lecturer) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer->restore();
        $this->lecturer->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->lecturer = Lecturer::onlyTrashed()->find($id);

        if (!$this->lecturer) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer->deleteImage();
        $this->lecturer->forceDelete();
        $this->lecturer->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        Lecturer::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        $data_lecturer = Lecturer::onlyTrashed()->get();

        foreach ($data_lecturer as $lecturer) {
            $lecturer->deleteImage();
            $lecturer->forceDelete();
        }

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = Lecturer::groupBy("created_by")->onlyActive()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Lecturer::groupBy("updated_by")->onlyActive()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Lecturer::groupBy("deleted_by")->onlyActive()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataLecturer()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_lecturer = Lecturer::query()
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

                ->when($this->code, function ($query) {
                    $query->where("code", "LIKE", "%{$this->code}%");
                })
                ->when($this->name, function ($query) {
                    $query->where("name", "LIKE", "%{$this->name}%");
                })
                ->when($this->description, function ($query) {
                    $query->where("description", "LIKE", "%{$this->description}%");
                })
                ->when($this->job, function ($query) {
                    $query->where("job", "LIKE", "%{$this->job}%");
                })
                ->when($this->phone, function ($query) {
                    $query->where("phone", "LIKE", "%{$this->phone}%");
                })
                ->when($this->email, function ($query) {
                    $query->where("email", "LIKE", "%{$this->email}%");
                })
                ->when($this->facebook, function ($query) {
                    $query->where("facebook", "LIKE", "%{$this->facebook}%");
                })
                ->when($this->twitter, function ($query) {
                    $query->where("twitter", "LIKE", "%{$this->twitter}%");
                })
                ->when($this->instagram, function ($query) {
                    $query->where("instagram", "LIKE", "%{$this->instagram}%");
                })
                ->when($this->linkedin, function ($query) {
                    $query->where("linkedin", "LIKE", "%{$this->linkedin}%");
                })
                ->when($this->scholar, function ($query) {
                    $query->where("scholar", "LIKE", "%{$this->scholar}%");
                });

                if ($this->order_by == "created_by") {
                    $data_lecturer->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_lecturer->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_lecturer->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else {
                    $data_lecturer->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_lecturer->onlyTrashed();
                }

                return $data_lecturer->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_lecturer" => $this->getDataLecturer(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

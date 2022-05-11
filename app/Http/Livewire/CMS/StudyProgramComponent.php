<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\StudyProgram;
use App\Models\StudyProgramCategory;
use App\Models\Admin;

class StudyProgramComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = "Study Program";
    public $menu_icon = "bi bi-book-half";
    public $menu_slug = "study-program";
    public $menu_table = "study_program";
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

    public $study_program;
    public $study_program_category = "";
    public $name;
    public $name_id;
    public $description;
    public $description_id;
    public $vision;
    public $vision_id;
    public $mission;
    public $mission_id;
    public $degree;
    public $duration;
    public $price;
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

        "study_program_category" => ["except" => ""],
        "name" => ["except" => ""],
        "name_id" => ["except" => ""],
        "degree" => ["except" => ""],
        "duration" => ["except" => ""],
        "price" => ["except" => ""],
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

        $this->study_program = null;
        $this->study_program_category = "";
        $this->name = null;
        $this->name_id = null;
        $this->description = null;
        $this->description_id = null;
        $this->vision = null;
        $this->vision_id = null;
        $this->mission = null;
        $this->mission_id = null;
        $this->degree = null;
        $this->duration = null;
        $this->price = null;
        $this->image = null;
    }

    public function resetForm()
    {
        $this->study_program_category = $this->study_program->study_program_category?->id;
        $this->name = $this->study_program->name;
        $this->name_id = $this->study_program->name_id;
        $this->description = $this->study_program->description;
        $this->description_id = $this->study_program->description_id;
        $this->vision = $this->study_program->vision;
        $this->vision_id = $this->study_program->vision_id;
        $this->mission = $this->study_program->mission;
        $this->mission_id = $this->study_program->mission_id;
        $this->degree = $this->study_program->degree;
        $this->duration = $this->study_program->duration;
        $this->price = $this->study_program->price;
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

    public function updatingStudyProgramCategory()
    {
        $this->resetPage();
    }

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingNameId()
    {
        $this->resetPage();
    }

    public function updatingDescription()
    {
        $this->resetPage();
    }

    public function updatingDescriptionId()
    {
        $this->resetPage();
    }

    public function updatingVision()
    {
        $this->resetPage();
    }

    public function updatingVisionId()
    {
        $this->resetPage();
    }

    public function updatingMission()
    {
        $this->resetPage();
    }

    public function updatingMissionId()
    {
        $this->resetPage();
    }

    public function updatingDegree()
    {
        $this->resetPage();
    }

    public function updatingDuration()
    {
        $this->resetPage();
    }

    public function updatingPrice()
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
                $this->study_program = StudyProgram::withTrashed()->find($this->row);
            } else {
                $this->study_program = StudyProgram::find($this->row);
            }

            if (!$this->study_program) {
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
            $this->study_program = StudyProgram::find($id);

            if (!$this->study_program) {
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

        $this->study_program = StudyProgram::withTrashed()->find($id);

        if (!$this->study_program) {
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
        $id = $this->menu_type == "edit" ? $this->study_program->id : null;

        return [
            "active"                    => "required",
            "study_program_category"    => "required|exists:study_program_category,id",
            "name"                      => "required|max:100|unique:{$this->menu_table},name,{$id}",
            "name_id"                   => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            "description"               => "nullable|max:65535",
            "description_id"            => "nullable|max:65535",
            "vision"                    => "nullable|max:65535",
            "vision_id"                 => "nullable|max:65535",
            "mission"                   => "nullable|max:65535",
            "mission_id"                => "nullable|max:65535",
            "degree"                    => "nullable|max:10|unique:{$this->menu_table},degree,{$id}",
            "duration"                  => "nullable|max:100",
            "price"                     => "nullable|max:100",
            "image"                     => "nullable|image|max:1048576|mimes:jpg,jpeg,png,gif,webp",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            if ($this->menu_type == "clone") {
                $image = $this->study_program->image;
            }
            $this->study_program = new StudyProgram();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->study_program->active = $this->active;

        $this->study_program->study_program_category_id = $this->study_program_category;
        $this->study_program->name = $this->name;
        $this->study_program->name_id = $this->name_id;
        $this->study_program->description = Str::of(htmlspecialchars($this->description))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->study_program->description_id = Str::of(htmlspecialchars($this->description_id))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->study_program->vision = Str::of(htmlspecialchars($this->vision))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->study_program->vision_id = Str::of(htmlspecialchars($this->vision_id))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->study_program->mission = Str::of(htmlspecialchars($this->mission))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->study_program->mission_id = Str::of(htmlspecialchars($this->mission_id))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->study_program->degree = $this->degree;
        $this->study_program->duration = $this->duration;
        $this->study_program->price = $this->price;

        if ($this->image) {
            if ($this->menu_type == "edit") {
                $this->study_program->deleteImage();
            }

            $this->study_program->image = date("YmdHis") . ".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->study_program->image, "images");
        } else {
            if ($this->menu_type == "clone") {
                if ($image && File::exists(public_path() . "/images/{$this->menu_slug}/{$image}")) {
                    $this->study_program->image = date("YmdHis") . "." . explode(".", $image)[1];
                    File::copy(public_path() . "/images/{$this->menu_slug}/{$image}", public_path() . "/images/{$this->menu_slug}/{$this->study_program->image}");
                }
            }
        }

        $this->study_program->slug = Str::slug($this->name);
        $this->study_program->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->study_program = StudyProgram::find($id);

        if (!$this->study_program) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->study_program->active = true;
        $this->study_program->save();
        $this->study_program->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->study_program = StudyProgram::find($id);

        if (!$this->study_program) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->study_program->active = false;
        $this->study_program->save();
        $this->study_program->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->study_program = StudyProgram::find($id);

        if (!$this->study_program) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->study_program->delete();
        $this->study_program->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->study_program = StudyProgram::onlyTrashed()->find($id);

        if (!$this->study_program) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->study_program->restore();
        $this->study_program->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->study_program = StudyProgram::onlyTrashed()->find($id);

        if (!$this->study_program) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->study_program->deleteImage();
        $this->study_program->forceDelete();
        $this->study_program->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        StudyProgram::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        $data_study_program = StudyProgram::onlyTrashed()->get();

        foreach ($data_study_program as $study_program) {
            $study_program->deleteImage();
            $study_program->forceDelete();
        }

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = StudyProgram::groupBy("created_by")->onlyActive()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = StudyProgram::groupBy("updated_by")->onlyActive()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = StudyProgram::groupBy("deleted_by")->onlyActive()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataStudyProgramCategory()
    {
        return StudyProgramCategory::onlyActive()->orderBy("name")->get();
    }

    public function getDataStudyProgram()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_study_program = StudyProgram::query()
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

                ->when($this->study_program_category, function ($query) {
                    $query->where("study_program_category_id", $this->study_program_category);
                })
                ->when($this->degree, function ($query) {
                    $query->where("degree", "LIKE", "%{$this->degree}%");
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
                ->when($this->vision, function ($query) {
                    $query->where("vision", "LIKE", "%{$this->vision}%");
                })
                ->when($this->vision_id, function ($query) {
                    $query->where("vision_id", "LIKE", "%{$this->vision_id}%");
                })
                ->when($this->mission, function ($query) {
                    $query->where("mission", "LIKE", "%{$this->mission}%");
                })
                ->when($this->mission_id, function ($query) {
                    $query->where("mission_id", "LIKE", "%{$this->mission_id}%");
                });

                if ($this->order_by == "created_by") {
                    $data_study_program->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_study_program->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_study_program->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "{$this->menu_table}_category_id") {
                    $data_news->join("{$this->menu_table}_category", "{$this->menu_table}_category.id", "{$this->menu_table}.{$this->menu_table}_category_id")
                        ->select("{$this->menu_table}.*", "{$this->menu_table}_category.name as {$this->menu_table}_category_name")
                        ->orderByRaw("{$this->menu_table}_category_name {$this->sort_by}");
                } else {
                    $data_study_program->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_study_program->onlyTrashed();
                }

                return $data_study_program->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_study_program" => $this->getDataStudyProgram(),
            "data_study_program_category" => $this->getDataStudyProgramCategory(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

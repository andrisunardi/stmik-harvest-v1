<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

use App\Models\LecturerEducation;
use App\Models\Lecturer;
use App\Models\Admin;

class LecturerEducationComponent extends Component
{
    use WithPagination;

    public $menu_name = "Lecturer Education";
    public $menu_icon = "bi bi-bank";
    public $menu_slug = "lecturer-education";
    public $menu_table = "lecturer_education";
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

    public $lecturer_education;
    public $lecturer = "";
    public $name;
    public $name_id;
    public $description;
    public $description_id;

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

        "lecturer" => ["except" => ""],
        "name" => ["except" => ""],
        "name_id" => ["except" => ""],
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

        $this->lecturer_education = null;
        $this->lecturer = "";
        $this->name = null;
        $this->name_id = null;
        $this->description = null;
        $this->description_id = null;
    }

    public function resetForm()
    {
        $this->active = $this->lecturer_education->active;
        $this->lecturer = $this->lecturer_education->lecturer?->id;
        $this->name = $this->lecturer_education->name;
        $this->name_id = $this->lecturer_education->name_id;
        $this->description = $this->lecturer_education->description;
        $this->description_id = $this->lecturer_education->description_id;
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

    public function updatingLecturer()
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
                $this->lecturer_education = LecturerEducation::withTrashed()->find($this->row);
            } else {
                $this->lecturer_education = LecturerEducation::find($this->row);
            }

            if (!$this->lecturer_education) {
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
            $this->lecturer_education = LecturerEducation::find($id);

            if (!$this->lecturer_education) {
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

        $this->lecturer_education = LecturerEducation::withTrashed()->find($id);

        if (!$this->lecturer_education) {
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
        $id = $this->menu_type == "edit" ? $this->lecturer_education->id : null;

        return [
            "active"            => "required",
            "lecturer"          => "required|exists:lecturer,id",
            "name"              => "required|max:100|unique:{$this->menu_table},name,{$id}",
            "name_id"           => "required|max:100|unique:{$this->menu_table},name_id,{$id}",
            "description"       => "nullable|max:65535",
            "description_id"    => "nullable|max:65535",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            $this->lecturer_education = new LecturerEducation();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->lecturer_education->active = $this->active;

        $this->lecturer_education->lecturer_id = $this->lecturer;
        $this->lecturer_education->name = $this->name;
        $this->lecturer_education->name_id = $this->name_id;
        $this->lecturer_education->description = Str::of(htmlspecialchars($this->description))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->lecturer_education->description_id = Str::of(htmlspecialchars($this->description_id))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->lecturer_education->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->lecturer_education = LecturerEducation::find($id);

        if (!$this->lecturer_education) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer_education->active = true;
        $this->lecturer_education->save();
        $this->lecturer_education->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->lecturer_education = LecturerEducation::find($id);

        if (!$this->lecturer_education) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer_education->active = false;
        $this->lecturer_education->save();
        $this->lecturer_education->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->lecturer_education = LecturerEducation::find($id);

        if (!$this->lecturer_education) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer_education->delete();
        $this->lecturer_education->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->lecturer_education = LecturerEducation::onlyTrashed()->find($id);

        if (!$this->lecturer_education) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer_education->restore();
        $this->lecturer_education->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->lecturer_education = LecturerEducation::onlyTrashed()->find($id);

        if (!$this->lecturer_education) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->lecturer_education->forceDelete();
        $this->lecturer_education->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        LecturerEducation::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        LecturerEducation::onlyTrashed()->forceDelete();

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = LecturerEducation::groupBy("created_by")->onlyActive()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = LecturerEducation::groupBy("updated_by")->onlyActive()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = LecturerEducation::groupBy("deleted_by")->onlyActive()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataLecturer()
    {
        return Lecturer::onlyActive()->orderBy("name")->get();
    }

    public function getDataLecturerEducation()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_lecturer_education = LecturerEducation::query()
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

                ->when($this->lecturer, function ($query) {
                    $query->where("lecturer_id", $this->lecturer);
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
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_lecturer_education->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_lecturer_education->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_lecturer_education->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_lecturer_education->where("active", $this->active);
                }

                if ($this->order_by == "created_by") {
                    $data_lecturer_education->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_lecturer_education->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_lecturer_education->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "lecturer_id") {
                    $data_lecturer_education->join("lecturer", "lecturer.id", "{$this->menu_table}.lecturer_id")
                        ->select("{$this->menu_table}.*", "lecturer.name as lecturer_name")
                        ->orderByRaw("lecturer_name {$this->sort_by}");
                } else {
                    $data_lecturer_education->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_lecturer_education->onlyTrashed();
                }

                return $data_lecturer_education->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_lecturer_education" => $this->getDataLecturerEducation(),
            "data_lecturer" => $this->getDataLecturer(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

use App\Models\RepositoryContributor;
use App\Models\Repository;
use App\Models\Lecturer;
use App\Models\Admin;

class RepositoryContributorComponent extends Component
{
    use WithPagination;

    public $menu_name = "Repository Contributor";
    public $menu_icon = "bi bi-people-fill";
    public $menu_slug = "repository-contributor";
    public $menu_table = "repository_contributor";
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

    public $repository_contributor;
    public $repository = "";
    public $lecturer = "";
    public $code;
    public $role;
    public $name;
    public $email;

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

        "repository" => ["except" => ""],
        "lecturer" => ["except" => ""],
        "code" => ["except" => ""],
        "role" => ["except" => ""],
        "name" => ["except" => ""],
        "email" => ["except" => ""],
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

        $this->repository_contributor = null;
        $this->repository = "";
        $this->lecturer = "";
        $this->code = null;
        $this->role = null;
        $this->name = null;
        $this->email = null;
    }

    public function resetForm()
    {
        $this->active = $this->repository_contributor->active;
        $this->repository = $this->repository_contributor->repository?->id;
        $this->lecturer = $this->repository_contributor->lecturer?->id;
        $this->code = $this->repository_contributor->code;
        $this->role = $this->repository_contributor->role;
        $this->name = $this->repository_contributor->name;
        $this->email = $this->repository_contributor->email;
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

    public function updatingRepository()
    {
        $this->resetPage();
    }

    public function updatingLecturer()
    {
        $this->resetPage();
    }

    public function updatedLecturer()
    {
        $this->resetPage();

        if ($this->menu_type != "index" && $this->menu_type != "trash") {
            $lecturer = Lecturer::find($this->lecturer);

            $this->code = $lecturer->code ?? null;
            $this->role = $lecturer->job ?? null;
            $this->name = $lecturer->name ?? null;
            $this->email = $lecturer->email ?? null;
        }
    }

    public function updatingCode()
    {
        $this->resetPage();
    }

    public function updatingRole()
    {
        $this->resetPage();
    }

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingEmail()
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
                $this->repository_contributor = RepositoryContributor::withTrashed()->find($this->row);
            } else {
                $this->repository_contributor = RepositoryContributor::find($this->row);
            }

            if (!$this->repository_contributor) {
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
            $this->repository_contributor = RepositoryContributor::find($id);

            if (!$this->repository_contributor) {
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

        $this->repository_contributor = RepositoryContributor::withTrashed()->find($id);

        if (!$this->repository_contributor) {
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
        return [
            "active"        => "required",
            "repository"    => "required|exists:repository,id",
            "lecturer"      => "nullable|exists:lecturer,id",
            "code"          => "nullable|max:50",
            "role"          => "nullable|max:50",
            "name"          => "nullable|max:50",
            "email"         => "nullable|email|max:50",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            $this->repository_contributor = new RepositoryContributor();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->repository_contributor->active = $this->active;

        $this->repository_contributor->repository_id = $this->repository;
        $this->repository_contributor->lecturer_id = $this->lecturer == "" ? null : $this->lecturer;
        $this->repository_contributor->code = $this->code;
        $this->repository_contributor->role = $this->role;
        $this->repository_contributor->name = $this->name;
        $this->repository_contributor->email = $this->email;
        // dd($this->repository_contributor->lecturer_id);
        $this->repository_contributor->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->repository_contributor = RepositoryContributor::find($id);

        if (!$this->repository_contributor) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_contributor->active = true;
        $this->repository_contributor->save();
        $this->repository_contributor->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->repository_contributor = RepositoryContributor::find($id);

        if (!$this->repository_contributor) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_contributor->active = false;
        $this->repository_contributor->save();
        $this->repository_contributor->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->repository_contributor = RepositoryContributor::find($id);

        if (!$this->repository_contributor) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_contributor->delete();
        $this->repository_contributor->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->repository_contributor = RepositoryContributor::onlyTrashed()->find($id);

        if (!$this->repository_contributor) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_contributor->restore();
        $this->repository_contributor->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->repository_contributor = RepositoryContributor::onlyTrashed()->find($id);

        if (!$this->repository_contributor) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_contributor->forceDelete();
        $this->repository_contributor->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        RepositoryContributor::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        RepositoryContributor::onlyTrashed()->get();

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = RepositoryContributor::groupBy("created_by")->onlyActive()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = RepositoryContributor::groupBy("updated_by")->onlyActive()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = RepositoryContributor::groupBy("deleted_by")->onlyActive()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataRepository()
    {
        return Repository::onlyActive()->orderBy("title")->get();
    }

    public function getDataLecturer()
    {
        return Lecturer::onlyActive()->orderBy("name")->get();
    }

    public function getDataRepositoryContributor()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_repository_contributor = RepositoryContributor::query()
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

                ->when($this->repository, function ($query) {
                    $query->where("repository_id", $this->repository);
                })
                ->when($this->lecturer, function ($query) {
                    $query->where("lecturer_id", $this->lecturer);
                })
                ->when($this->code, function ($query) {
                    $query->where("code", "LIKE", "%{$this->code}%");
                })
                ->when($this->role, function ($query) {
                    $query->where("role", "LIKE", "%{$this->role}%");
                })
                ->when($this->name, function ($query) {
                    $query->where("name", "LIKE", "%{$this->name}%");
                })
                ->when($this->email, function ($query) {
                    $query->where("email", "LIKE", "%{$this->email}%");
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_repository_contributor->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_repository_contributor->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_repository_contributor->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_repository_contributor->where("active", $this->active);
                }

                if ($this->order_by == "created_by") {
                    $data_repository_contributor->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_repository_contributor->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_repository_contributor->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "repository_id") {
                    $data_repository_contributor->join("repository", "repository.id", "{$this->menu_table}.repository_id")
                        ->select("{$this->menu_table}.*", "repository.title as repository_title")
                        ->orderByRaw("repository_title {$this->sort_by}");
                } else if ($this->order_by == "lecturer_id") {
                    $data_repository_contributor->join("lecturer", "lecturer.id", "{$this->menu_table}.lecturer_id")
                        ->select("{$this->menu_table}.*", "lecturer.name as lecturer_name")
                        ->orderByRaw("lecturer_name {$this->sort_by}");
                } else {
                    $data_repository_contributor->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_repository_contributor->onlyTrashed();
                }

                return $data_repository_contributor->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_repository_contributor" => $this->getDataRepositoryContributor(),
            "data_repository" => $this->getDataRepository(),
            "data_lecturer" => $this->getDataLecturer(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

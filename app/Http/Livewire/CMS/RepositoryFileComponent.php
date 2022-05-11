<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\RepositoryFile;
use App\Models\Repository;
use App\Models\Admin;

class RepositoryFileComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = "Repository File";
    public $menu_icon = "bi bi-file-pdf";
    public $menu_slug = "repository-file";
    public $menu_table = "repository_file";
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

    public $repository_file;
    public $repository = "";
    public $name;
    public $description;
    public $file;
    public $public;

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
        "name" => ["except" => ""],
        "description" => ["except" => ""],
        "public" => ["except" => ""],
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

        $this->repository_file = null;
        $this->repository = "";
        $this->name = null;
        $this->description = null;
        $this->file = null;
        $this->public = null;
    }

    public function resetForm()
    {
        $this->active = $this->repository_file->active;
        $this->repository = $this->repository_file->repository?->id;
        $this->name = $this->repository_file->name;
        $this->description = $this->repository_file->description;
        $this->public = $this->repository_file->public;
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

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingDescription()
    {
        $this->resetPage();
    }

    public function updatingPublic()
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
                $this->repository_file = RepositoryFile::withTrashed()->find($this->row);
            } else {
                $this->repository_file = RepositoryFile::find($this->row);
            }

            if (!$this->repository_file) {
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
        $this->public = true;

        if ($menu_type != "add" && $id) {
            $this->repository_file = RepositoryFile::find($id);

            if (!$this->repository_file) {
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

        $this->repository_file = RepositoryFile::withTrashed()->find($id);

        if (!$this->repository_file) {
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
        $id = $this->menu_type == "edit" ? $this->repository_file->id : null;

        return [
            "active"        => "required",
            "repository"    => "required|exists:repository,id",
            "name"          => "required|max:100|unique:{$this->menu_table},name,{$id}",
            "description"   => "nullable|max:65535",
            "file"          => "nullable|file|max:102400|mimes:pdf|mimetypes:application/pdf",
            "public"        => "required",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            if ($this->menu_type == "clone") {
                $file = $this->repository_file->file;
            }
            $this->repository_file = new RepositoryFile();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->repository_file->active = $this->active;

        $this->repository_file->repository_id = $this->repository;
        $this->repository_file->name = $this->name;
        $this->repository_file->description = Str::of(htmlspecialchars($this->description))->swap(["&lt;" => "<", "&gt;" => ">"]);

        if ($this->file) {
            if ($this->menu_type == "edit") {
                if ($this->repository_file->file && File::exists(public_path() . "/files/{$this->menu_slug}/{$this->repository_file->file}")) {
                    File::delete(public_path() . "/files/{$this->menu_slug}/{$this->repository_file->file}");
                }
            }

            $this->repository_file->file = date("YmdHis") . ".{$this->file->getClientOriginalExtension()}";
            $this->file->storePubliclyAs($this->menu_slug, $this->repository_file->file, "files");
        } else {
            if ($this->menu_type == "clone") {
                if ($file && File::exists(public_path() . "/files/{$this->menu_slug}/{$file}")) {
                    $this->repository_file->file = date("YmdHis") . "." . explode(".", $file)[1];
                    File::copy(public_path() . "/files/{$this->menu_slug}/{$file}", public_path() . "/files/{$this->menu_slug}/{$this->repository_file->file}");
                }
            }
        }

        $this->repository_file->public = $this->public;
        $this->repository_file->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->repository_file = RepositoryFile::find($id);

        if (!$this->repository_file) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_file->active = true;
        $this->repository_file->save();
        $this->repository_file->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->repository_file = RepositoryFile::find($id);

        if (!$this->repository_file) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_file->active = false;
        $this->repository_file->save();
        $this->repository_file->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->repository_file = RepositoryFile::find($id);

        if (!$this->repository_file) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_file->delete();
        $this->repository_file->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->repository_file = RepositoryFile::onlyTrashed()->find($id);

        if (!$this->repository_file) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_file->restore();
        $this->repository_file->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->repository_file = RepositoryFile::onlyTrashed()->find($id);

        if (!$this->repository_file) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository_file->deleteVideo();
        $this->repository_file->forceDelete();
        $this->repository_file->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        RepositoryFile::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        $data_repository_file = RepositoryFile::onlyTrashed()->get();

        foreach ($data_repository_file as $repository_file) {
            $repository_file->deleteFile();
            $repository_file->forceDelete();
        }

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = RepositoryFile::groupBy("created_by")->onlyActive()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = RepositoryFile::groupBy("updated_by")->onlyActive()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = RepositoryFile::groupBy("deleted_by")->onlyActive()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataRepository()
    {
        return Repository::onlyActive()->orderBy("title")->get();
    }

    public function getDataRepositoryFile()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_repository_file = RepositoryFile::query()
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
                ->when($this->name, function ($query) {
                    $query->where("name", "LIKE", "%{$this->name}%");
                })
                ->when($this->description, function ($query) {
                    $query->where("description", "LIKE", "%{$this->description}%");
                })
                ->when($this->public, function ($query) {
                    $query->where("public", "LIKE", "%{$this->public}%");
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_repository_file->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_repository_file->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_repository_file->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_repository_file->where("active", $this->active);
                }
                if ($this->public || $this->public == "0") {
                    $data_repository_file->where("public", $this->public);
                }

                if ($this->order_by == "created_by") {
                    $data_repository_file->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_repository_file->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_repository_file->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "repository_id") {
                    $data_repository_file->join("repository", "repository.id", "{$this->repository_table}.repository_id")
                        ->select("{$this->menu_table}.*", "repository.title as repository_title")
                        ->orderByRaw("repository_title {$this->sort_by}");
                } else {
                    $data_repository_file->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_repository_file->onlyTrashed();
                }

                return $data_repository_file->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_repository_file" => $this->getDataRepositoryFile(),
            "data_repository" => $this->getDataRepository(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

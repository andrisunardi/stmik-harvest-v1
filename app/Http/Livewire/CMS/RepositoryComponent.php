<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use App\Models\Repository;
use App\Models\RepositorySubject;
use App\Models\StudyProgram;
use App\Models\User;
use App\Models\Admin;

class RepositoryComponent extends Component
{
    use WithPagination;

    public $menu_name = "Repository";
    public $menu_icon = "bi bi-journal-text";
    public $menu_slug = "repository";
    public $menu_table = "repository";
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

    public $repository;
    public $repository_subject = "";
    public $study_program = "";
    public $user = "";
    public $status = "";
    public $title;
    public $journal_title;
    public $date;
    public $publication_date;
    public $first_name;
    public $last_name;
    public $corporate_author;
    public $publisher;
    public $year;
    public $abstract;
    public $url;
    public $keyword;
    public $volume;
    public $issue;
    public $all_page;
    public $first_page;
    public $last_page;
    public $scholar;
    public $image;
    public $file;

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

        "repository_subject" => ["except" => ""],
        "study_program" => ["except" => ""],
        "user" => ["except" => ""],
        "status" => ["except" => ""],
        "title" => ["except" => ""],
        "journal_title" => ["except" => ""],
        "date" => ["except" => ""],
        "publication_date" => ["except" => ""],
        "first_name" => ["except" => ""],
        "last_name" => ["except" => ""],
        "corporate_author" => ["except" => ""],
        "publisher" => ["except" => ""],
        "year" => ["except" => ""],
        "abstract" => ["except" => ""],
        "url" => ["except" => ""],
        "keyword" => ["except" => ""],
        "volume" => ["except" => ""],
        "issue" => ["except" => ""],
        "all_page" => ["except" => ""],
        "first_page" => ["except" => ""],
        "last_page" => ["except" => ""],
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

        $this->repository = null;
        $this->repository_subject = "";
        $this->study_program = "";
        $this->user = "";
        $this->status = "";
        $this->title = null;
        $this->journal_title = null;
        $this->date = null;
        $this->publication_date = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->corporate_author = null;
        $this->publisher = null;
        $this->year = null;
        $this->abstract = null;
        $this->url = null;
        $this->keyword = null;
        $this->volume = null;
        $this->issue = null;
        $this->all_page = null;
        $this->first_page = null;
        $this->last_page = null;
        $this->scholar = null;
        $this->image = null;
        $this->file = null;
    }

    public function resetForm()
    {
        $this->active = $this->repository->active;
        $this->repository_subject = $this->repository->repository_subject?->id;
        $this->study_program = $this->repository->study_program?->id;
        $this->user = $this->repository->user?->id;
        $this->status = $this->repository->status;
        $this->title = $this->repository->title;
        $this->journal_title = $this->repository->journal_title;
        $this->date = $this->repository->date;
        $this->publication_date = $this->repository->publication_date;
        $this->first_name = $this->repository->first_name;
        $this->last_name = $this->repository->last_name;
        $this->corporate_author = $this->repository->corporate_author;
        $this->publisher = $this->repository->publisher;
        $this->year = $this->repository->year;
        $this->abstract = $this->repository->abstract;
        $this->url = $this->repository->url;
        $this->keyword = $this->repository->keyword;
        $this->volume = $this->repository->volume;
        $this->issue = $this->repository->issue;
        $this->all_page = $this->repository->page;
        $this->first_page = $this->repository->first_page;
        $this->last_page = $this->repository->last_page;
        $this->scholar = $this->repository->scholar;
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

    public function updatingRepositorySubject()
    {
        $this->resetPage();
    }

    public function updatingStudyProgram()
    {
        $this->resetPage();
    }

    public function updatingUser()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingTitle()
    {
        $this->resetPage();
    }

    public function updatingJournalTitle()
    {
        $this->resetPage();
    }

    public function updatingDate()
    {
        $this->resetPage();
    }

    public function updatingPublicationDate()
    {
        $this->resetPage();
    }

    public function updatingFirstName()
    {
        $this->resetPage();
    }

    public function updatingLastName()
    {
        $this->resetPage();
    }

    public function updatingCorporateAuthor()
    {
        $this->resetPage();
    }

    public function updatingPublisher()
    {
        $this->resetPage();
    }

    public function updatingYear()
    {
        $this->resetPage();
    }

    public function updatingAbstract()
    {
        $this->resetPage();
    }

    public function updatingUrl()
    {
        $this->resetPage();
    }

    public function updatingKeyword()
    {
        $this->resetPage();
    }

    public function updatingVolume()
    {
        $this->resetPage();
    }

    public function updatingIssue()
    {
        $this->resetPage();
    }

    public function updatingAllPage()
    {
        $this->resetPage();
    }

    public function updatingFirstPage()
    {
        $this->resetPage();
    }

    public function updatingLastPage()
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
            $this->date = now()->format("Y-m-d");
            $this->publication_date = now()->format("Y-m-d");
        }

        if ($this->row && ($this->menu_type != "index" || $this->menu_type != "trash")) {
            if ($this->menu_type == "view") {
                $this->repository = Repository::withTrashed()->find($this->row);
            } else {
                $this->repository = Repository::find($this->row);
            }

            if (!$this->repository) {
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
        $this->status = 1;
        $this->date = now()->format("Y-m-d");
        $this->publication_date = now()->format("Y-m-d");

        if ($menu_type != "add" && $id) {
            $this->repository = Repository::find($id);

            if (!$this->repository) {
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

        $this->repository = Repository::withTrashed()->find($id);

        if (!$this->repository) {
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
        $id = $this->menu_type == "edit" ? $this->repository->id : null;

        return [
            "active"                => "required",
            "repository_subject"    => "required|exists:repository_subject,id",
            "study_program"         => "required|exists:study_program,id",
            "user"                  => "required|exists:user,id",
            "status"                => "required|" . Rule::in(0, 1, 2),
            "title"                 => "required|max:100|unique:{$this->menu_table},title,{$id}",
            "journal_title"         => "nullable|max:100",
            "date"                  => "nullable|max:10|max:10|date_format:Y-m-d",
            "publication_date"      => "nullable|max:10|max:10|date_format:Y-m-d",
            "first_name"            => "nullable|max:100",
            "last_name"             => "nullable|max:100",
            "corporate_author"      => "nullable|max:100",
            "publisher"             => "nullable|max:100",
            "year"                  => "nullable|numeric|digits:4|min:1900|max:" . now()->format("Y"),
            "abstract"              => "nullable|max:65535",
            "url"                   => "nullable|url|max:100",
            "keyword"               => "nullable|max:100",
            "volume"                => "nullable|max:100",
            "issue"                 => "nullable|max:100",
            "all_page"              => "nullable|numeric|min:0|max:999999999",
            "first_page"            => "nullable|numeric|min:0|max:999999999",
            "last_page"             => "nullable|numeric|min:0|max:999999999",
            "scholar"               => "nullable|url|max:100",
            "image"                 => "nullable|image|max:102400|mimes:jpg,jpeg,png,gif,webp",
            "file"                  => "nullable|file|max:102400|mimes:pdf|mimetypes:application/pdf",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            if ($this->menu_type == "clone") {
                $image = $this->repository->image;
                $file = $this->repository->file;
            }
            $this->repository = new Repository();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->repository->active = $this->active;

        $this->repository->repository_subject_id = $this->repository_subject;
        $this->repository->study_program_id = $this->study_program;
        $this->repository->user_id = $this->user;
        $this->repository->status = $this->status;
        $this->repository->title = $this->title;
        $this->repository->journal_title = $this->journal_title;
        $this->repository->date = $this->date;
        $this->repository->publication_date = $this->publication_date;
        $this->repository->first_name = $this->first_name;
        $this->repository->last_name = $this->last_name;
        $this->repository->corporate_author = $this->corporate_author;
        $this->repository->publisher = $this->publisher;
        $this->repository->year = $this->year;
        $this->repository->abstract = Str::of(htmlspecialchars($this->abstract))->swap(["&lt;" => "<", "&gt;" => ">"]);
        $this->repository->url = $this->url;
        $this->repository->keyword = $this->keyword;
        $this->repository->volume = $this->volume;
        $this->repository->issue = $this->issue;
        $this->repository->page = $this->all_page;
        $this->repository->first_page = $this->first_page;
        $this->repository->last_page = $this->last_page;
        $this->repository->scholar = $this->scholar;

        if ($this->image) {
            if ($this->menu_type == "edit") {
                $this->repository->deleteImage();
            }

            $this->repository->image = date("YmdHis") . ".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->repository->image, "images");
        } else {
            if ($this->menu_type == "clone") {
                if ($image && File::exists(public_path() . "/images/{$this->menu_slug}/{$image}")) {
                    $this->repository->image = date("YmdHis") . "." . explode(".", $image)[1];
                    File::copy(public_path() . "/images/{$this->menu_slug}/{$image}", public_path() . "/images/{$this->menu_slug}/{$this->repository->image}");
                }
            }
        }

        if ($this->file) {
            if ($this->menu_type == "edit") {
                $this->repository->deleteVideo();
            }

            $this->repository->file = date("YmdHis") . ".{$this->file->getClientOriginalExtension()}";
            $this->file->storePubliclyAs($this->menu_slug, $this->repository->file, "files");
        } else {
            if ($this->menu_type == "clone") {
                if ($file && File::exists(public_path() . "/files/{$this->menu_slug}/{$file}")) {
                    $this->repository->file = date("YmdHis") . "." . explode(".", $file)[1];
                    File::copy(public_path() . "/files/{$this->menu_slug}/{$file}", public_path() . "/files/{$this->menu_slug}/{$this->repository->file}");
                }
            }
        }

        $this->repository->slug = Str::slug($this->title);
        $this->repository->save();

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->repository = Repository::find($id);

        if (!$this->repository) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository->active = true;
        $this->repository->save();
        $this->repository->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->repository = Repository::find($id);

        if (!$this->repository) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository->active = false;
        $this->repository->save();
        $this->repository->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->repository = Repository::find($id);

        if (!$this->repository) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository->delete();
        $this->repository->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->repository = Repository::onlyTrashed()->find($id);

        if (!$this->repository) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository->restore();
        $this->repository->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->repository = Repository::onlyTrashed()->find($id);

        if (!$this->repository) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->repository->deleteImage();
        $this->repository->deleteFile();
        $this->repository->forceDelete();
        $this->repository->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        Repository::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        $data_repository = Repository::onlyTrashed()->get();

        foreach ($data_repository as $repository) {
            $repository->deleteImage();
            $repository->deleteFile();
            $repository->forceDelete();
        }

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = Repository::groupBy("created_by")->onlyActive()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Repository::groupBy("updated_by")->onlyActive()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Repository::groupBy("deleted_by")->onlyActive()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->onlyActive()->orderBy("name")->get();
    }

    public function getDataRepositorySubject()
    {
        return RepositorySubject::onlyActive()->orderBy("name")->get();
    }

    public function getDataStudyProgram()
    {
        return StudyProgram::onlyActive()->orderBy("name")->get();
    }

    public function getDataUser()
    {
        return User::onlyActive()->orderBy("name")->get();
    }

    public function getDataRepository()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_repository = Repository::query()
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

                ->when($this->repository_subject, function ($query) {
                    $query->where("repository_subject_id", $this->repository_subject);
                })
                ->when($this->study_program, function ($query) {
                    $query->where("study_program_id", $this->study_program);
                })
                ->when($this->user, function ($query) {
                    $query->where("user_id", $this->user);
                })
                ->when($this->status, function ($query) {
                    $query->where("status", $this->status);
                })
                ->when($this->title, function ($query) {
                    $query->where("title", "LIKE", "%{$this->title}%");
                })
                ->when($this->journal_title, function ($query) {
                    $query->where("journal_title", "LIKE", "%{$this->journal_title}%");
                })
                ->when($this->date, function ($query) {
                    $query->where("date", $this->date);
                })
                ->when($this->publication_date, function ($query) {
                    $query->where("publication_date", $this->publication_date);
                })
                ->when($this->first_name, function ($query) {
                    $query->where("first_name", "LIKE", "%{$this->first_name}%");
                })
                ->when($this->last_name, function ($query) {
                    $query->where("last_name", "LIKE", "%{$this->last_name}%");
                })
                ->when($this->corporate_author, function ($query) {
                    $query->where("corporate_author", "LIKE", "%{$this->corporate_author}%");
                })
                ->when($this->publisher, function ($query) {
                    $query->where("publisher", "LIKE", "%{$this->publisher}%");
                })
                ->when($this->year, function ($query) {
                    $query->where("year", $this->year);
                })
                ->when($this->abstract, function ($query) {
                    $query->where("abstract", "LIKE", "%{$this->abstract}%");
                })
                ->when($this->url, function ($query) {
                    $query->where("url", "LIKE", "%{$this->url}%");
                })
                ->when($this->keyword, function ($query) {
                    $query->where("keyword", "LIKE", "%{$this->keyword}%");
                })
                ->when($this->volume, function ($query) {
                    $query->where("volume", "LIKE", "%{$this->volume}%");
                })
                ->when($this->issue, function ($query) {
                    $query->where("issue", "LIKE", "%{$this->issue}%");
                })
                ->when($this->all_page, function ($query) {
                    $query->where("page", $this->all_page);
                })
                ->when($this->first_page, function ($query) {
                    $query->where("first_page", $this->first_page);
                })
                ->when($this->last_page, function ($query) {
                    $query->where("last_page", $this->last_page);
                })
                ->when($this->scholar, function ($query) {
                    $query->where("scholar", "LIKE", "%{$this->scholar}%");
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_repository->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_repository->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_repository->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_repository->where("active", $this->active);
                }
                if ($this->status || $this->status == "0") {
                    $data_repository->where("status", $this->status);
                }

                if ($this->order_by == "created_by") {
                    $data_repository->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_repository->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_repository->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "repository_subject_id") {
                    $data_repository->join("repository_subject", "repository_subject.id", "{$this->menu_table}.repository_subject_id")
                        ->select("{$this->menu_table}.*", "repository_subject.name as repository_subject_name")
                        ->orderByRaw("repository_subject_name {$this->sort_by}");
                } else if ($this->order_by == "study_program_id") {
                    $data_repository->join("study_program", "study_program.id", "{$this->menu_table}.study_program_id")
                        ->select("{$this->menu_table}.*", "study_program.name as study_program_name")
                        ->orderByRaw("study_program_name {$this->sort_by}");
                } else if ($this->order_by == "user_id") {
                    $data_repository->join("user", "user.id", "{$this->menu_table}.user_id")
                        ->select("{$this->menu_table}.*", "user.name as user_name")
                        ->orderByRaw("user_name {$this->sort_by}");
                } else {
                    $data_repository->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_repository->onlyTrashed();
                }

                return $data_repository->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_repository" => $this->getDataRepository(),
            "data_repository_subject" => $this->getDataRepositorySubject(),
            "data_study_program" => $this->getDataStudyProgram(),
            "data_user" => $this->getDataUser(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}

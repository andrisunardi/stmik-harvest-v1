<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

use App\Models\Banner;
use App\Models\RepositorySubject;
use App\Models\Repository;
use App\Models\StudyProgram;

class RepositoryComponent extends Component
{
    use WithPagination;

    public $menu_name = "Repository";
    public $menu_icon = "fas fa-book";
    public $menu_slug = "repository";
    public $menu_table = "repository";

    public $queryString = [
        "page" => ["except" => 1],
        "subject" => ["except" => ""],
        "study_program" => ["except" => ""],
        "title" => ["except" => ""],
        "abstract" => ["except" => ""],
        "author" => ["except" => ""],
        "year" => ["except" => ""],
    ];

    public $page = 1;
    public $subject = "";
    public $study_program = "";
    public $title;
    public $abstract;
    public $author;
    public $year;

    public function updatingSubject()
    {
        $this->resetPage();
    }

    public function updatingStudyProgram()
    {
        $this->resetPage();
    }

    public function updatingTitle()
    {
        $this->resetPage();
    }

    public function updatingAbstract()
    {
        $this->resetPage();
    }

    public function updatingAuthor()
    {
        $this->resetPage();
    }

    public function updatingYear()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->banner = Banner::find(7);

        $this->total_repository = Repository::onlyActive()->cursor()->count();

        $this->data_repository_subject_sidebar = RepositorySubject::onlyActive()->orderBy("name")->get();

        $this->data_repository_subject = RepositorySubject::onlyActive()->orderBy("name")->get();

        $this->data_study_program = StudyProgram::onlyActive()->orderBy("name")->get();
    }

    public function render()
    {
        $data_repository = Repository::when($this->subject, fn ($query) =>$query->where("repository_subject_id", $this->subject))
            ->when($this->study_program, fn ($query) =>$query->where("study_program_id", $this->study_program))
            ->when($this->title, fn ($query) =>
                $query->where("title", "like", "%{$this->title}%")->orWhere("keyword", "like", "%{$this->title}%")
            )
            ->when($this->abstract, fn ($query) =>$query->where("abstract", $this->abstract))
            ->when($this->author, fn ($query) =>
                $query->where("first_name", "like", "%{$this->author}%")
                    ->orWhere("last_name", "like", "%{$this->author}%")
                    ->orWhere("corporate_author", "like", "%{$this->author}%")
            )
            ->when($this->year, fn ($query) =>$query->where("year", $this->year))
            ->onlyActive()->orderByDesc("id");

        if ($this->title) {
            Session::flash("success", trans("message.Found") . " <b>'{$data_repository->count()}'</b> " . trans("message.results for") . " <b>'{$this->title}'</b>");
        }

        $data_repository = $data_repository->paginate(10);

        return view("livewire.{$this->menu_slug}.index", ["data_repository" => $data_repository])->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}

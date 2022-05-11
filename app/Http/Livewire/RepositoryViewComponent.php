<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Banner;
use App\Models\Repository;
use App\Models\RepositorySubject;
use App\Models\RepositoryFile;

class RepositoryViewComponent extends Component
{
    public $menu_name = "Repository";
    public $menu_icon = "fas fa-book";
    public $menu_slug = "repository";
    public $menu_table = "repository";

    public $repository;
    public $name;
    public $email;
    public $phone;
    public $title;
    public $message;

    public function mount($repository_slug)
    {
        $this->banner = Banner::find(7);

        $this->repository = Repository::where("slug", $repository_slug)->onlyActive()->first();

        if (!$this->repository) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_repository_file = RepositoryFile::where("repository_id", $this->repository->id)
            ->onlyActive()
            ->orderBy("id")
            ->get();

        $this->data_other_repository = Repository::where("id", "!=", $this->repository->id)
            ->onlyActive()
            ->inRandomOrder()
            ->limit("3")
            ->get();

        $this->data_repository_subject = RepositorySubject::onlyActive()->orderByDesc("id")->get();

        $this->data_recent_repository = Repository::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_popular_tags = Repository::onlyActive()->orderByDesc("id")->first();
    }

    public function render()
    {
        $this->repository->refresh();

        return view("livewire.{$this->menu_slug}.view")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}

<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\Lecturer;
use App\Models\News;
use App\Models\Repository;
use App\Models\StudyProgram;

Breadcrumbs::for("index", function (BreadcrumbTrail $trail) {
    $trail->push(trans("page.Home"), route("index"));
});

Breadcrumbs::for("about.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.About"), route("about.index"));
});

Breadcrumbs::for("lecturer.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Lecturer"), route("lecturer.index"));
});

Breadcrumbs::for("lecturer.view", function (BreadcrumbTrail $trail, $lecturer_slug) {
    $lecturer = Lecturer::where("slug", $lecturer_slug)->onlyActive()->firstOrFail();
    $trail->parent("lecturer.index");
    $trail->push("{$lecturer->name}", route("lecturer.view", $lecturer_slug));
});

Breadcrumbs::for("gallery.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Gallery"), route("gallery.index"));
});

Breadcrumbs::for("faq.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Faq"), route("faq.index"));
});

Breadcrumbs::for("study-program.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Study Program"), route("study-program.index"));
});

Breadcrumbs::for("study-program.view", function (BreadcrumbTrail $trail, $study_program_slug) {
    $study_program = StudyProgram::where("slug", $study_program_slug)->onlyActive()->firstOrFail();
    $trail->parent("study-program.index");
    $trail->push("{$study_program->translate_name}", route("study-program.view", $study_program_slug));
});

Breadcrumbs::for("news.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.News & Event"), route("news.index"));
});

Breadcrumbs::for("news.view", function (BreadcrumbTrail $trail, $news_slug) {
    $news = News::where("slug", $news_slug)->onlyActive()->firstOrFail();
    $trail->parent("news.index");
    $trail->push("{$news->translate_name}", route("news.view", $news_slug));
});

Breadcrumbs::for("magazine.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Magazine"), route("magazine.index"));
});

Breadcrumbs::for("contact-us.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Contact Us"), route("contact-us.index"));
});

Breadcrumbs::for("event.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Event"), route("event.index"));
});

Breadcrumbs::for("international-student.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Magazine"), route("international-student.index"));
});

Breadcrumbs::for("journal.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Journal"), route("journal.index"));
});

Breadcrumbs::for("registration.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Registration"), route("registration.index"));
});

Breadcrumbs::for("repository.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Repository"), route("repository.index"));
});

Breadcrumbs::for("repository.view", function (BreadcrumbTrail $trail, $repository_slug) {
    $repository = Repository::where("slug", $repository_slug)->onlyActive()->firstOrFail();
    $trail->parent("repository.index");
    $trail->push("{$repository->title}", route("repository.view", $repository_slug));
});

Breadcrumbs::for("scholarship.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Scholarship"), route("scholarship.index"));
});

Breadcrumbs::for("login.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Login"), route("login.index"));
});

Breadcrumbs::for("register.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Register"), route("register.index"));
});

Breadcrumbs::for("forgot-password.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Forgot Password"), route("forgot-password.index"));
});

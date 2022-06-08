<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\News;

Breadcrumbs::for("errors.404", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Error"));
});

Breadcrumbs::for("index", function (BreadcrumbTrail $trail) {
    $trail->push(trans("page.Home"), route("index"));
});

Breadcrumbs::for("about.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.About"), route("about.index"));
});

Breadcrumbs::for("our-profile.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Our Profile"), route("our-profile.index"));
});

Breadcrumbs::for("our-values.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Our Values"), route("our-values.index"));
});

Breadcrumbs::for("our-network.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Our Network"), route("our-network.index"));
});

Breadcrumbs::for("our-gallery.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Our Gallery"), route("our-gallery.index"));
});

Breadcrumbs::for("online-registration.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Online Registration"), route("online-registration.index"));
});

Breadcrumbs::for("admission-calendar.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Admission Calendar"), route("admission-calendar.index"));
});

Breadcrumbs::for("procedure.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Procedure"), route("procedure.index"));
});

Breadcrumbs::for("tuition-fees.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Tuition Fees"), route("tuition-fees.index"));
});

Breadcrumbs::for("scholarships.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Scholarships"), route("scholarships.index"));
});

Breadcrumbs::for("information-system.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Information System"), route("information-system.index"));
});

Breadcrumbs::for("events.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Events"), route("events.index"));
});

Breadcrumbs::for("faq.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Faq"), route("faq.index"));
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

Breadcrumbs::for("contact-us.index", function (BreadcrumbTrail $trail) {
    $trail->parent("index");
    $trail->push(trans("page.Contact Us"), route("contact-us.index"));
});

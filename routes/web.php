<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

Route::any("locale/{locale}", function ($locale) {
    App::setLocale($locale);
    Config::set("app.locale", $locale);
    Session::put("locale", $locale);
    return redirect()->back()->withInfo(trans("language.Language has been changed"));
});

Route::name("cms.")->as("cms.")->namespace("CMS")->prefix("cms")
    // ->prefix(env("APP_ENV") == "production" ? "" : "cms")
    // ->domain(env("APP_ENV") == "production" ? "www.cms." . env("APP_DOMAIN") : "")
    ->group(base_path("routes/cms.php"));

$page = "Home";
Route::group(["prefix" => null, "as" => null], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "About";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Our Profile";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Our Values";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Our Network";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Admission";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Online Registration";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Admission Calendar";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Tuition Fees";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Scholarships";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Procedure";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Lecturer";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
    Route::any("{lecturer_slug}", Str::studly($page) . "ViewComponent")->name("view");
});

$page = "Gallery";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Faq";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Study Program";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
    Route::any("{study_program_slug}", Str::studly($page) . "ViewComponent")->name("view");
});

$page = "News";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
    Route::any("{news_slug}", Str::studly($page) . "ViewComponent")->name("view");
});

$page = "Registration";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "International Student";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Event";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Journal";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Repository";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
    Route::any("{repository_slug}", Str::studly($page) . "ViewComponent")->name("view");
});

$page = "Magazine";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Contact Us";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Search";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Register";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Login";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Forgot Password";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

Route::group(["middleware" => "auth:user"], function () {

    $page = "Account";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

    $page = "Logout";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

});

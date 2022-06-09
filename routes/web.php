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
    return redirect()->back()->withInfo(trans("index.Language has been changed"));
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

$page = "Faq";
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

$page = "Information System";
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

$page = "Information System";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Our Gallery";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Events";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Blog";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
    Route::any("{blog_slug}", Str::studly($page) . "ViewComponent")->name("view");
});

$page = "Contact Us";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

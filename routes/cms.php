<?php

use App\Models\Menu;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

Route::any("locale/{locale}", function ($locale) {
    Session::put("locale", $locale);
    App::setLocale($locale);
    return redirect()->back()->withInfo(trans("index.Language has been changed"));
});

$page = "Login";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

$page = "Forgot Password";
Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
    Route::any("", Str::studly($page) . "Component")->name("index");
});

Route::group(["middleware" => "auth:admin"], function () {

    $page = "Home";
    Route::group(["prefix" => null, "as" => null], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

    $page = "All Menu";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

    $page = "History";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

    $page = "Config";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

    if (Schema::hasTable("menu")) {
        $data_menu = Menu::active()->orderBy("sort")->get();
        foreach ($data_menu as $menu) {
            $page = $menu->name;
            Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
                Route::any("", Str::studly($page) . "Component")->name("index");
            });
        }
    }

    $page = "Profile";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });

    $page = "Logout";
    Route::group(["prefix" => Str::slug($page), "as" => Str::slug($page) . "."], function () use ($page) {
        Route::any("", Str::studly($page) . "Component")->name("index");
    });
});

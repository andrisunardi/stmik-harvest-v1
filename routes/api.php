<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

$page = "Home";
Route::group(["prefix" => null, "as" => null], function () use ($page) {
    $controller = Str::studly($page) . "Controller";
    Route::any("", $controller . "@index")->name("index");
});

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Controller;

class HomeController extends Controller
{
    public $name = "Home";
    public $icon = "fas fa-home";
    public $slug = "home";
    public $table = "home";

    public function index()
    {
        return response()->json([
            "status" => 1,
            "code" => 200,
            "message" => "Success",
            "data" => "No Data"
        ]);
    }
}

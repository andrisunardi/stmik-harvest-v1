@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "503 - Service Unavailable")
@section("code", "503")
@section("message", "Service Unavailable")
@section("description", "The server is currently unavailable (overloaded or down)")

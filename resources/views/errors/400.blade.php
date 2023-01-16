@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "400 - Bad Request")
@section("code", "400")
@section("message", "Bad Request")
@section("description", "The request cannot be fulfilled due to bad syntax")

@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "410 - Gone")
@section("code", "410")
@section("message", "Gone")
@section("description", "The requested page is no longer available")

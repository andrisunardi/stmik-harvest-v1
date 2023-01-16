@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "404 - Not Found")
@section("code", "404")
@section("message", "Not Found")
@section("description", "The requested page could not be found but may be available again in the future")

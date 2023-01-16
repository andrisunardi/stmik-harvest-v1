@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "425 - Too Early")
@section("code", "425")
@section("message", "Too Early")
@section("description", "Indicates that the server is unwilling to risk processing a request that might be replayed")

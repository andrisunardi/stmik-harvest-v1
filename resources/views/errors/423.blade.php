@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "423 - Locked")
@section("code", "423")
@section("message", "Locked")
@section("description", "The resource that is being accessed is locked")

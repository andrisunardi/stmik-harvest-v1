@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "419 - Page Expired")
@section("code", "419")
@section("message", "Page Expired")
@section("description", "Sorry, your session has expired. Please refresh and try again")

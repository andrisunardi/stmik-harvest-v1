@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "409 - Conflict")
@section("code", "409")
@section("message", "Conflict")
@section("description", "The request could not be completed because of a conflict in the request")

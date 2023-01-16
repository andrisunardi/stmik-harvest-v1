@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "507 - Insufficient Storage")
@section("code", "507")
@section("message", "Insufficient Storage")
@section("description", "The server is unable to store the representation needed to complete the request")

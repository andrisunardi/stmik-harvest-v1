@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "501 - Not Implemented")
@section("code", "501")
@section("message", "Not Implemented")
@section("description", "The server either does not recognize the request method, or it lacks the ability to fulfill the request
")

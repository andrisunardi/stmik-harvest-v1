@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "501 - Not Implemented")
@section("code", "501")
@section("message", "Not Implemented")
@section("description", "The server either does not recognize the request method, or it lacks the ability to fulfill the request
")

@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "500 - Internal Server Error")
@section("code", "500")
@section("message", "Internal Server Error")
@section("description", "A generic error message, given when no more specific message is suitable")

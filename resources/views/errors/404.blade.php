@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "404 - Not Found")
@section("code", "404")
@section("message", "Not Found")
@section("description", "The requested page could not be found but may be available again in the future")

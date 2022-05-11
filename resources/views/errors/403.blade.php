@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "403 - Forbidden")
@section("code", "403")
@section("message", "Forbidden")
@section("description", "The request was a legal request, but the server is refusing to respond to it")

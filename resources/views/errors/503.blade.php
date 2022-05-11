@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "503 - Service Unavailable")
@section("code", "503")
@section("message", "Service Unavailable")
@section("description", "The server is currently unavailable (overloaded or down)")

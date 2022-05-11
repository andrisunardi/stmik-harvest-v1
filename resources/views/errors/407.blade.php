@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "407 - Proxy Authentication Required")
@section("code", "407")
@section("message", "Proxy Authentication Required")
@section("description", "The client must first authenticate itself with the proxy")

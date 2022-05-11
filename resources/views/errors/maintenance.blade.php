@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "503 - Maintenance")
@section("code", "503")
@section("message", "Maintenance")
@section("description", "Sorry, we are doing some maintenance. Please check back soon")

<title>@yield("name") | {{ env("APP_TITLE") }}</title>

@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "503 - Maintenance")
@section("code", "503")
@section("message", "Maintenance")
@section("description", "Sorry, we are doing some maintenance. Please check back soon")

<title>@yield("title") | {{ env("APP_TITLE") }}</title>

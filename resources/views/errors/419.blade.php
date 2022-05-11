@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "419 - Page Expired")
@section("code", "419")
@section("message", "Page Expired")
@section("description", "Sorry, your session has expired. Please refresh and try again")

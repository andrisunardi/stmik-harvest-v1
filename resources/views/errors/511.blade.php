@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "511 - Network Authentication Required")
@section("code", "511")
@section("message", "Network Authentication Required")
@section("description", "The client needs to authenticate to gain network access")

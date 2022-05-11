@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "509 - Bandwidth Limit Exceeded")
@section("code", "509")
@section("message", "Bandwidth Limit Exceeded")
@section("description", "The server is temporarily unable to service your request due to the site owner reaching his/her bandwidth limit. Please try again later")

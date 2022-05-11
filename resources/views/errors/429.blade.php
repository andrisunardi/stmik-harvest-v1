@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "429 - Too Many Requests")
@section("code", "429")
@section("message", "Too Many Requests")
@section("description", "The user has sent too many requests in a given amount of time. Intended for use with rate-limiting schemes")

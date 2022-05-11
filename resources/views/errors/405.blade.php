@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "405 - Method Not Allowed")
@section("code", "405")
@section("message", "Method Not Allowed")
@section("description", "A request was made of a page using a request method not supported by that page")

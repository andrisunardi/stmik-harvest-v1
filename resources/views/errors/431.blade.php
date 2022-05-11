@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "431 - Request Header Fields Too Large")
@section("code", "431")
@section("message", "Request Header Fields Too Large")
@section("description", "The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large")

@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "505 - HTTP Version Not Supported")
@section("code", "505")
@section("message", "HTTP Version Not Supported")
@section("description", "The server does not support the HTTP protocol version used in the request")

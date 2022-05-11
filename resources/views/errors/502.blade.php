@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "502 - Bad Gateway")
@section("code", "502")
@section("message", "Bad Gateway")
@section("description", "The server was acting as a gateway or proxy and received an invalid response from the upstream server")

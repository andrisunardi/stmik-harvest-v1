@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "406 - Not Acceptable")
@section("code", "406")
@section("message", "Not Acceptable")
@section("description", "The server can only generate a response that is not accepted by the client")

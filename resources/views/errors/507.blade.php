@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "507 - Insufficient Storage")
@section("code", "507")
@section("message", "Insufficient Storage")
@section("description", "The server is unable to store the representation needed to complete the request")

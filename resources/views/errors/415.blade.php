@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "415 - Unsupported Media Type")
@section("code", "415")
@section("message", "Unsupported Media Type")
@section("description", "The server will not accept the request, because the media type is not supported")

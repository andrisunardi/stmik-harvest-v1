@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "424 - Locked")
@section("code", "424")
@section("message", "Locked")
@section("description", "The request failed because it depended on another request and that request failed (e.g., a PROPPATCH)")

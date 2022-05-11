@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "409 - Conflict")
@section("code", "409")
@section("message", "Conflict")
@section("description", "The request could not be completed because of a conflict in the request")

@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "505 - Not Extended")
@section("code", "505")
@section("message", "Not Extended")
@section("description", "Further extensions to the request are required for the server to fulfil it")

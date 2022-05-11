@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "426 - Upgrade Required")
@section("code", "426")
@section("message", "Upgrade Required")
@section("description", "The client should switch to a different protocol such as TLS/1.0, given in the Upgrade header field")

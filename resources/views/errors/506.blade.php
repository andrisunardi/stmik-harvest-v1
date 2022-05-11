@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "506 - Variant Also Negotiates")
@section("code", "506")
@section("message", "Variant Also Negotiates")
@section("description", "Transparent content negotiation for the request results in a circular reference")

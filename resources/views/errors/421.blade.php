@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "421 - Misdirected Request")
@section("code", "421")
@section("message", "Misdirected Request")
@section("description", "The request was directed at a server that is not able to produce a response[56] (for example because of connection reuse)")

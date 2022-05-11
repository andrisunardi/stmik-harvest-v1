@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "417 - Expectation Failed")
@section("code", "417")
@section("message", "Expectation Failed")
@section("description", "The server cannot meet the requirements of the Expect request-header field")

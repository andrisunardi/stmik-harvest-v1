@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "508 - Loop Detected")
@section("code", "508")
@section("message", "Loop Detected")
@section("description", "The server detected an infinite loop while processing the request (sent instead of 208 Already Reported)")

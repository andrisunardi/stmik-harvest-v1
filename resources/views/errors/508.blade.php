@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "508 - Loop Detected")
@section("code", "508")
@section("message", "Loop Detected")
@section("description", "The server detected an infinite loop while processing the request (sent instead of 208 Already Reported)")

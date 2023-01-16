@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "408 - Request Timeout")
@section("code", "408")
@section("message", "Request Timeout")
@section("description", "The server timed out waiting for the request")

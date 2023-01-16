@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "504 - Gateway Timeout")
@section("code", "504")
@section("message", "Gateway Timeout")
@section("description", "The server was acting as a gateway or proxy and did not receive a timely response from the upstream server")

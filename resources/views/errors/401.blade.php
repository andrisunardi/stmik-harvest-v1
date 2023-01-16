@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "401 - Unauthorized")
@section("code", "401")
@section("message", "Unauthorized")
@section("description", "The request was a legal request, but the server is refusing to respond to it. For use when authentication is possible but has failed or not yet been provided")

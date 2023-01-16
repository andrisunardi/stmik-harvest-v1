@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "413 - Request Entity Too Large")
@section("code", "413")
@section("message", "Request Entity Too Large")
@section("description", "The server will not accept the request, because the request entity is too large")

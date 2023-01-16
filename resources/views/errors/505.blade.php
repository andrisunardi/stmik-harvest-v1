@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "505 - HTTP Version Not Supported")
@section("code", "505")
@section("message", "HTTP Version Not Supported")
@section("description", "The server does not support the HTTP protocol version used in the request")

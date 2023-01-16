@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "414 - Request-URI Too Long")
@section("code", "414")
@section("message", "Request-URI Too Long")
@section("description", "The server will not accept the request, because the URL is too long. Occurs when you convert a POST request to a GET request with a long query information")

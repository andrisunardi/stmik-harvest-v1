@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "411 - Length Required")
@section("code", "411")
@section("message", "Length Required")
@section("description", 'The "Content-Length" is not defined. The server will not accept the request without it')

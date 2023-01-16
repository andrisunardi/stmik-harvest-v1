@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "421 - Misdirected Request")
@section("code", "421")
@section("message", "Misdirected Request")
@section("description", "The request was directed at a server that is not able to produce a response[56] (for example because of connection reuse)")

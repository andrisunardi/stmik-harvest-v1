@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "417 - Expectation Failed")
@section("code", "417")
@section("message", "Expectation Failed")
@section("description", "The server cannot meet the requirements of the Expect request-header field")

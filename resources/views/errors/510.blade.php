@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "505 - Not Extended")
@section("code", "505")
@section("message", "Not Extended")
@section("description", "Further extensions to the request are required for the server to fulfil it")

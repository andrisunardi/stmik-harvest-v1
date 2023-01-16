@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "511 - Network Authentication Required")
@section("code", "511")
@section("message", "Network Authentication Required")
@section("description", "The client needs to authenticate to gain network access")

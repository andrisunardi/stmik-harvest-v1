@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "422 - Unprocessable Entity")
@section("code", "422")
@section("message", "Unprocessable Entity")
@section("description", "The request was well-formed but was unable to be followed due to semantic errors")

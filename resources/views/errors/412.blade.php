@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "412 - Precondition Failed")
@section("code", "412")
@section("message", "Precondition Failed")
@section("description", "The precondition given in the request evaluated to false by the server")

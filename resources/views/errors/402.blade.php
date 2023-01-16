@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "402 - Payment Required")
@section("code", "402")
@section("message", "Payment Required")
@section("description", "Reserved for future use")

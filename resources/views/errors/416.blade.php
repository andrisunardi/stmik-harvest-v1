@env("production")
    @php($route = Str::substr(Request::url(), 12, 3))
@else
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("title", "416 - Requested Range Not Satisfiable")
@section("code", "416")
@section("message", "Requested Range Not Satisfiable")
@section("description", "The client has asked for a portion of the file, but the server cannot supply that portion")

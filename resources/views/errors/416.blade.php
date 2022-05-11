@if (env("APP_ENV") == "local")
    @php($route = Request::segment(1))
@else
    {{-- @php($route = Str::substr(Request::url(), 12, 3)) --}}
    @php($route = Request::segment(1))
@endif
@extends($route == "cms" ? "cms.layouts.app" : "layouts.app")

@section("name", "416 - Requested Range Not Satisfiable")
@section("code", "416")
@section("message", "Requested Range Not Satisfiable")
@section("description", "The client has asked for a portion of the file, but the server cannot supply that portion")

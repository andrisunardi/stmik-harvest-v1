<?php

return [

    "class_namespace" => "App\\Http\\Livewire",

    "view_path" => resource_path("views/livewire"),

    "layout" => "layouts.app",

    "asset_url" => env("APP_ENV") == "production" ? "public" : null,

    "app_url" => env("APP_ENV") == "production" ? env("APP_URL") : null,

    "middleware_group" => "web",

    "temporary_file_upload" => [
        "disk" => null,
        "rules" => null,
        "directory" => null,
        "middleware" => null,
        "preview_mimes" => [
            "png", "gif", "bmp", "svg", "wav", "mp4",
            "mov", "avi", "wmv", "mp3", "m4a",
            "jpg", "jpeg", "mpga", "webp", "wma", "pdf",
        ],
        "max_upload_time" => 5,
    ],

    "manifest_path" => null,

    "back_button_cache" => false,

    "render_on_redirect" => false,

];

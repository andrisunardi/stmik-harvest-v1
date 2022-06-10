<?php

return [

    "enabled" => env("DEBUGBAR_ENABLED", null),
    "except" => [
        "telescope*",
        "horizon*",
    ],

    "storage" => [
        "enabled"    => true,
        "driver"     => "file",
        "path"       => storage_path("debugbar"),
        "connection" => null,
        "provider"   => "",
        "hostname"   => "127.0.0.1",
        "port"       => 2304,
    ],

    "editor" => env("DEBUGBAR_EDITOR", "vscode"),

    "remote_sites_path" => env("DEBUGBAR_REMOTE_SITES_PATH", ""),
    "local_sites_path" => env("DEBUGBAR_LOCAL_SITES_PATH", ""),

    "include_vendors" => true,

    "capture_ajax" => true,
    "add_ajax_timing" => false,

    "error_handler" => false,

    "clockwork" => true,

    "collectors" => [
        "phpinfo"         => true,
        "messages"        => true,
        "time"            => true,
        "memory"          => true,
        "exceptions"      => true,
        "log"             => true,
        "db"              => true,
        "views"           => true,
        "route"           => true,
        "auth"            => true,
        "gate"            => true,
        "session"         => true,
        "symfony_request" => true,
        "mail"            => true,
        "laravel"         => true,
        "events"          => true,
        "default_request" => true,
        "logs"            => true,
        "files"           => true,
        "config"          => true,
        "cache"           => true,
        "models"          => true,
        "livewire"        => true,
    ],

    "options" => [
        "auth" => [
            "show_name" => true,
        ],
        "db" => [
            "with_params" => true,
            "backtrace" => true,
            "backtrace_exclude_paths" => [],
            "timeline" => true,
            "duration_background" => true,
            "explain" => [
                "enabled" => true,
                "types" => ["SELECT"],
            ],
            "hints" => true,
            "show_copy" => true,
        ],
        "mail" => [
            "full_log" => true,
        ],
        "views" => [
            "timeline" => true,
            "data" => true,
        ],
        "route" => [
            "label" => true,
        ],
        "logs" => [
            "file" => null,
        ],
        "cache" => [
            "values" => true,
        ],
    ],

    "inject" => true,

    "route_prefix" => "_debugbar",

    "route_domain" => null,

    "theme" => env("DEBUGBAR_THEME", "auto"),

    "debug_backtrace_limit" => 50,
];

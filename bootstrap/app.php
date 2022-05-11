<?php

$app = new Illuminate\Foundation\Application(
    $_ENV["APP_BASE_PATH"] ?? dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// Disable Blocked by CORS policy
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: *");
// header("Access-Control-Allow-Headers: *");
// Disable Blocked by CORS policy

return $app;

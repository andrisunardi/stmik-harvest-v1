<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command("inspire", function () {
    $this->comment(Inspiring::quote());
})->purpose("Display an inspiring quote");

Artisan::command("logs:clear", function () {
    array_map("unlink", array_filter((array) glob(storage_path("logs/*.log"))));
    $this->comment("Logs have been cleared!");
    Log::info("Logs have been cleared!");
})->purpose("Clear log files");

Artisan::command("livewire-tmp:clear", function () {
    array_map("unlink", array_filter((array) glob(storage_path("app/livewire-tmp/*"))));
    $this->comment("Livewire tmp have been cleared!");
    Log::info("Livewire tmp have been cleared!");
})->purpose("Clear livewire tmp files");

Artisan::command("database:clear", function () {
    array_map("unlink", array_filter((array) glob(storage_path("app/database/*.sql"))));
    $this->comment("Database have been cleared!");
    Log::info("Database have been cleared!");
})->purpose("Clear database files");

<?php

use Spatie\Ignition\Solutions\SolutionProviders\BadMethodCallSolutionProvider;
use Spatie\Ignition\Solutions\SolutionProviders\MergeConflictSolutionProvider;
use Spatie\Ignition\Solutions\SolutionProviders\UndefinedPropertySolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\DefaultDbNameSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\GenericLaravelExceptionSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\IncorrectValetDbCredentialsSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\InvalidRouteActionSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\MissingAppKeySolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\MissingColumnSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\MissingImportSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\MissingLivewireComponentSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\MissingMixManifestSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\MissingViteManifestSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\RunningLaravelDuskInProductionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\TableNotFoundSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\UndefinedViewVariableSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\UnknownValidationSolutionProvider;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\ViewNotFoundSolutionProvider;

return [

    'editor' => env('IGNITION_EDITOR', 'phpstorm'),

    'theme' => env('IGNITION_THEME', 'auto'),

    'enable_share_button' => env('IGNITION_SHARING_ENABLED', true),

    'register_commands' => env('REGISTER_IGNITION_COMMANDS', false),

    'solution_providers' => [
        // from spatie/ignition
        BadMethodCallSolutionProvider::class,
        MergeConflictSolutionProvider::class,
        UndefinedPropertySolutionProvider::class,

        // from spatie/laravel-ignition
        IncorrectValetDbCredentialsSolutionProvider::class,
        MissingAppKeySolutionProvider::class,
        DefaultDbNameSolutionProvider::class,
        TableNotFoundSolutionProvider::class,
        MissingImportSolutionProvider::class,
        InvalidRouteActionSolutionProvider::class,
        ViewNotFoundSolutionProvider::class,
        RunningLaravelDuskInProductionProvider::class,
        MissingColumnSolutionProvider::class,
        UnknownValidationSolutionProvider::class,
        MissingMixManifestSolutionProvider::class,
        MissingViteManifestSolutionProvider::class,
        MissingLivewireComponentSolutionProvider::class,
        UndefinedViewVariableSolutionProvider::class,
        GenericLaravelExceptionSolutionProvider::class,
    ],

    'ignored_solution_providers' => [

    ],

    'enable_runnable_solutions' => env('IGNITION_ENABLE_RUNNABLE_SOLUTIONS', env('APP_DEBUG', false)),

    'remote_sites_path' => env('IGNITION_REMOTE_SITES_PATH', base_path()),
    'local_sites_path' => env('IGNITION_LOCAL_SITES_PATH', ''),

    'housekeeping_endpoint_prefix' => '_ignition',

    'settings_file_path' => '',

];

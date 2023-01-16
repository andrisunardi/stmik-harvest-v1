# Portfolio
Name : DIW.co.id<br>
Category : Company Profile<br>
Date : October 27, 2015<br>
Client : DIW.co.id<br>
Domain : [diw.co.id](https://www.diw.co.id)

## Spatie - Activity Log
### INSTALLATION
```
composer require spatie/laravel-activitylog
```
```
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"
```
```
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"
```
### Models
```
protected static $logAttributes = ['name'];
protected static $ignoreChangedAttributes = ['password'];
protected static $recordEvents = ['created', 'updated', 'deleted'];
protected static $logOnlyDirty = true;
protected static $logName = 'user';
```
```
public function getDescriptionforEvent(string $eventName): string
{
    return "You have {$eventName} user";
}
```
### Source
[Spatie - Laravel Activity Log](https://spatie.be/docs/laravel-activitylog)

## Spatie - Laravel Permission
### INSTALLATION
```
composer require spatie/laravel-permission
```
config/app.php
```
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];
```
```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
```
php artisan migrate
```

### app\Exceptions\Handler.php
```
public function render($request, Throwable $exception)
{
    if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
        return response()->json([
            'responseMessage' => 'You do not have the required authorization.',
            'responseStatus'  => 403,
        ]);
    }

    return parent::render($request, $exception);
}
```
### Source
[Spatie - Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction)

## Laravel - Error Handling
### INSTALLATION
```
php artisan vendor:publish --tag=laravel-errors
```

### Source
[Laravel - Error Handling](https://laravel.com/docs/9.x/errors)



# STMIK Harvest

## Composer Install
```
composer require diglactic/laravel-breadcrumbs
```
```
composer require spatie/laravel-translatable
```
```
composer require doctrine/dbal
```
```
composer require livewire/livewire
```
```
composer require realrashid/sweet-alert
```
```
composer require spatie/laravel-permission
```
```
composer require spatie/laravel-translatable
```
```
composer require barryvdh/laravel-debugbar --dev
```
```
composer require brianium/paratest --dev
```
```
composer require psr/simple-cache ^2.0
```
```
composer require maatwebsite/excel
```
```
composer require barryvdh/laravel-dompdf
```
```
php artisan vendor:publish
```

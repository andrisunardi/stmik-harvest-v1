@setup
    require __DIR__.'/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
@endsetup

@servers(['web' => env("DEPLOY_SERVER")])

@task('deploy', ['on' => ['web']])
    echo "Start Deploy"

    echo "DEPLOY SERVER : " {{ env('DEPLOY_SERVER') }}
    echo "DEPLOY DIRECTORY : " {{ env('DEPLOY_DIRECTORY') }}
    echo "DEPLOY BRANCH : " {{ env('DEPLOY_BRANCH') }}
    echo "DEPLOY RENDER MAINTENANCE : " {{ env('DEPLOY_RENDER_MAINTENANCE') }}

    echo "Directory" {{ $directory ?? env("DEPLOY_DIRECTORY") }}
    cd {{ $directory ?? env("DEPLOY_DIRECTORY") }}

    echo "Down"
    php artisan down --render={{ $maintenance ?? env("DEPLOY_RENDER_MAINTENANCE") }}

    echo "Git Pull Origin " {{ $branch ?? env("DEPLOY_BRANCH") }}
    git pull origin {{ $branch ?? env("DEPLOY_BRANCH") }}

    echo "Composer Install"
    composer install

    echo "Migrate"
    php artisan migrate --force

    echo "Unit Testing"
    ./vendor/bin/pint --test

    echo "Optimize"
    php artisan optimize:clear

    echo "Up"
    php artisan up

    echo "End Deploy"
@endtask

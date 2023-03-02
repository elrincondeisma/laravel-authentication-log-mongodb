<?php

namespace Elrincondeisma\LaravelAuthenticationLogMongodb;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Contracts\Events\Dispatcher;
use Elrincondeisma\LaravelAuthenticationLogMongodb\Commands\PurgeAuthenticationLogCommand;
use Elrincondeisma\LaravelAuthenticationLogMongodb\Listeners\FailedLoginListener;
use Elrincondeisma\LaravelAuthenticationLogMongodb\Listeners\LoginListener;
use Elrincondeisma\LaravelAuthenticationLogMongodb\Listeners\LogoutListener;
use Elrincondeisma\LaravelAuthenticationLogMongodb\Listeners\OtherDeviceLogoutListener;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAuthenticationLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-authentication-log-mongodb')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews()
            ->hasMigration('create_authentication_log_table')
            ->hasCommand(PurgeAuthenticationLogCommand::class);

        $events = $this->app->make(Dispatcher::class);
        $events->listen(config('authentication-log.events.login', Login::class), LoginListener::class);
        $events->listen(config('authentication-log.events.failed', Failed::class), FailedLoginListener::class);
        $events->listen(config('authentication-log.events.logout', Logout::class), LogoutListener::class);
        $events->listen(config('authentication-log.events.other-device-logout', OtherDeviceLogout::class), OtherDeviceLogoutListener::class);
    }
}

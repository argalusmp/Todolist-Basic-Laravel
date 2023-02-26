<?php

namespace App\Providers;

use App\Services\RegisterService;
use App\Services\Implement\RegisterServiceImplement;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserRegisterProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        RegisterService::class => RegisterServiceImplement::class
    ];
    public function provides(): array
    {
        return [RegisterService::class];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\CheckPasswordPolicy;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('check_password', [CheckPasswordPolicy::class, 'checkPassword']);

        /*
        Gate::define('check_password', function () {
          $user = User::find(auth()->user()->id);
            if($user->password_route == 0){
               return true;
            }
            return false;
        });
        */

    }
}

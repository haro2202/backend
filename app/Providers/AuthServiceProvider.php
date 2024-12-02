<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //

        ResetPassword::createUrlUsing(function (User $user, string $token) {
            // get user email
            $email = $user->email;

            return 'https://salmon-water-027c64f00.4.azurestaticapps.net/recovery/'.$email.'?token='.$token;
        });
    }
}

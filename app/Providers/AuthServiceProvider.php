<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Admin
        Gate::define('isAdmin', function ($user) {
            return $user->level == 'admin';
        });
        Gate::define('isMekanik', function ($user) {
            return $user->member->mekanik != null && $user->member->mekanik()->where('statusHapus','0')->first()->statusAktivasi == '1';
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Address' =>  'App\Policies\Api\AddressPolicy',
        'App\Models\CategoriesCourse' =>  'App\Policies\Api\CategoriesCoursePolicy',
        'App\Models\Category' =>  'App\Policies\Api\CategoryPolicy',
        'App\Models\ContactForm' =>  'App\Policies\Api\ContactFormPolicy',
        'App\Models\Country' =>  'App\Policies\Api\CountryPolicy',
        'App\Models\Course' =>  'App\Policies\Api\CoursePolicy',
        'App\Models\ModelHasPermission' =>  'App\Policies\Api\ModelHasPermissionPolicy',
        'App\Models\ModelHasRole' =>  'App\Policies\Api\ModelHasRolePolicy',
        'App\Models\PermissionGroup' =>  'App\Policies\Api\PermissionGroupPolicy',
        'App\Models\Provider' =>  'App\Policies\Api\ProviderPolicy',
        'App\Models\Transaction' =>  'App\Policies\Api\TransactionPolicy',
        'App\Models\TransactionStatus' =>  'App\Policies\Api\TransactionStatusPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

    }
}

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
        'App\Models\Address::class' =>  'App\Policies\Api\AddressPolicy::class',
        'App\Models\Blog::class' =>  'App\Policies\Api\BlogPolicy::class',
        'App\Models\ContactForm::class' =>  'App\Policies\Api\ContactFormPolicy::class',
        'App\Models\Content::class' =>  'App\Policies\Api\ContentPolicy::class',
        'App\Models\ContentType::class' =>  'App\Policies\Api\ContentTypePolicy::class',
        'App\Models\Country::class' =>  'App\Policies\Api\CountryPolicy::class',
        'App\Models\EmailVerification::class' =>  'App\Policies\Api\EmailVerificationPolicy::class',
        'App\Models\ModelHasPermission::class' =>  'App\Policies\Api\ModelHasPermissionPolicy::class',
        'App\Models\ModelHasRole::class' =>  'App\Policies\Api\ModelHasRolePolicy::class',
        'App\Models\PermissionGroup::class' =>  'App\Policies\Api\PermissionGroupPolicy::class',
        'App\Models\Transaction::class' =>  'App\Policies\Api\TransactionPolicy::class',
        'App\Models\TransactionStatus::class' =>  'App\Policies\Api\TransactionStatusPolicy::class',
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

@component('mail::message')
# Successful Referral

Hi {{ $user->first_name }},

You have just successfully referred a friend or family member to the {{ env('APP_NAME') }} system.

We will no begin the process of planting trees on your behalf! Congratulations on doing your bit for the planet.

@component('mail::button', ['url' => env('APP_URL') . '/auth/login'])
Login To Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

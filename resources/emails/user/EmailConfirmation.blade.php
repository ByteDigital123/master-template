@component('mail::message')
# Email Verification

Hi {{ $user->first_name }},

Please click the link attached to verify your email  with the {{ env('APP_NAME') }} system.


Following this email you will receive your welcome pack along with your subscription details.


@component('mail::button', ['url' => env('APP_URL') . '/auth/email-verification/' . $user->referral_link])
Verify Email Address
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

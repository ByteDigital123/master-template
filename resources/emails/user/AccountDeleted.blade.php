@component('mail::message')
# Account Deleted

Hi {{ $user->first_name }},

We are sorry to hear you wanted to close your account with us.

We hope you consider joining us again in future to help contribute to a cleaner planet.

@component('mail::button', ['url' => env('APP_URL')])
Join {{ env('APP_NAME') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

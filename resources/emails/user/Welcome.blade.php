@component('mail::message')
# Welcome To {{ env('APP_NAME') }}

Hi {{ $user->first_name }},

Thank you for registering with the {{ env('APP_NAME') }} system.


We are pleased you have decided to join the community helping to offset the worlds carbon emissions.

If you have any questions please don't hesitate to get in touch with a member of our team to discuss.


@component('mail::button', ['url' => env('APP_URL') . '/auth/login'])
Login To Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

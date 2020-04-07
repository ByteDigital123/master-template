@component('mail::message')
# Course Purchased

Hi {{ $user->first_name }},

This is a test email.

@component('mail::button', ['url' => env('APP_URL')])
   View Course
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

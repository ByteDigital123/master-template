@component('mail::message')
# Contact Form Submitted

Hi,

Somebody has just submitted the contact form<br>
The details can be seen below:<br>

**First Name**: {{ $contact->first_name }}<br>
**Last Name**: {{ $contact->last_name }}<br>
**Email**: {{ $contact->email }}<br>
**Message**: {{ $contact->message }}<br>


@component('mail::button', ['url' => env('APP_BACKEND')])
Login To Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Contact Form Submitted

Hi,

Somebody has just submitted the contact form<br>
The details can be seen below:<br>

**First Name**: {{ $contact->first_name }}<br>
**Last Name**: {{ $contact->last_name }}<br>
**Email**: {{ $contact->email }}<br>
**Message**: {{ $contact->message }}<br>


@if($contact->multiple_staff)
**This person is looking to buy courses for multiple staff members.**
@endif

@if($contact->multiple_courses)
**This personal is wanting to buy a bulk of different courses.**
@endif

@if($contact->individual_courses)
**This personal is wanting to buy multiple individual courses for themselves**
@endif


@component('mail::button', ['url' => env('APP_BACKEND')])
Login To Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

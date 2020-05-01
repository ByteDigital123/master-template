@component('mail::message')
# Course Purchased From {{ $course->provider->name }}

Hi,

A user has just purchased a course on the CPD system.<br>
The details can be seen below:<br>

**First Name**: {{ $user->first_name }}<br>
**Last Name**: {{ $user->last_name }}<br>
**Username**: {{ $user->username }}<br>
**Telephone**: {{ $user->telephone }}<br>
**Email**: {{ $user->email }}<br>


**Course**: {{ $course->title }}<br>
**Provider Reference ID**: {{ $course->provider_reference_id }}<br>
**Provider Price**: £{{ $course->provider_price }}<br>
**Retail Price**: £{{ $course->retail_price }}<br>

@component('mail::button', ['url' => env('APP_BACKEND')])
Login To Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

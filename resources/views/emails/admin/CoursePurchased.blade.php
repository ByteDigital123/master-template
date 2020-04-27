@component('mail::message')
# Course Purchased From {{ $course->provider->name }}

Hi,

A user has just purchased a course on the CPD system.<br>
The details can be seen below:

**Course**: {{ $course->title }}
**Provider Reference ID**: {{ $course->provider_reference_id }}
**Provider Price**: £{{ $course->provider_price }}
**Retail Price**: £{{ $course->retail_price }}

@component('mail::button', ['url' => env('APP_BACKEND')])
Login To Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# {{ env('APP_NAME') }} Account Deleted

Hi {{ $user->first_name }},

We are sorry to hear you wanted to close your account with us. We hope you consider re-joining us again in future.

If you have any questions about setting up your account again in future, please contact a member of our team.

@component('mail::button', ['url' => env('APP_URL')])
    Join {{ env('APP_NAME') }}
@endcomponent

Thanks,<br>
{{ env('APP_NAME') }}
@endcomponent

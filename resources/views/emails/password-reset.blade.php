@component('mail::message')
# Reset Password

Klik tombol di bawah ini untuk mereset password Anda:

@component('mail::button', ['url' => route('password.reset', $token)])
Reset Password
@endcomponent

Jika Anda tidak meminta reset password, abaikan email ini.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Introduction

Follow the link below to reset your password in ART STAIRS.
'http://127.0.0.1:8000/password/reset/{{ $token }}/{{ $mail }}'

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

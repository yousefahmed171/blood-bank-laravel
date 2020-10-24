@component('mail::message')
# Introduction


Blood Bank Reset Password


<p>Hello {{$user->name}}</p>


@component('mail::button', ['url' => '', 'color' => 'success'])
Reset
@endcomponent


<p>Your Reset Code Is : {{$user->pin_code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

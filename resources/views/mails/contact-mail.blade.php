@component('mail::message')
# Test mail

<p>
	<strong>Email:</strong> {{ $contact['email'] }}
</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
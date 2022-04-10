@component('mail::message')
# Test mail

<p>
	<strong>Email:</strong> {{ $contact['email'] }}
</p>
<p>{{ $contact['message'] }}</p>

Viva la Paperella,<br>
{{ env('MAIL_FROM_NAME') }}
@endcomponent
@component('mail::message')
# Hello {{ $name }},

Thank you for registering for **{{ $eventTitle }}**.

**Event Details:**
- 📅 Date: {{ $eventDate }}
- ⏰ Time: {{ $eventTime }}
- 📍 Venue: {{ $eventVenue }}

We look forward to seeing you there!

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent

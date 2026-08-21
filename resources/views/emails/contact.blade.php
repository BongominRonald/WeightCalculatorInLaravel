<x-mail::message>
# New Contact Message

**From:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}

## Message:
{{ $data['message'] }}

<hr>
<small>Sent via S6WeightCalculator contact form</small>
</x-mail::message>

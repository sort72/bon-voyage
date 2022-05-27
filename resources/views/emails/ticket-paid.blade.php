@component('mail::message')
# Confirmación de compra en Bon Voyage

Hola {{$ticket->passenger_name}}, se ha realizado la compra de un vuelo para {{ $ticket->flight->destination->city->name }} el día {{ DateHelper::beautify($ticket->updated_at, 'short_complete_with_time') }}

Tu vuelo sale desde {{ $ticket->flight->origin->city->name }} el día {{ DateHelper::beautify($ticket->flight->departure_time, 'complete_with_time') }}

**Código de la reserva:** {{$ticket->reservation_code}}

**Número de documento de la reserva:** {{$ticket->passenger_document}}

Utiliza esta información para realizar un Check-In oportuno en el siguiene enlace:

@component('mail::button', ['url' => route('external.checkin', ['reservation' => $ticket->reservation_code, 'dni' => $ticket->passenger_document]) ])
Realizar Check-In
@endcomponent

Atentamente,<br>
El equipo de Bon Voyage
@endcomponent

@component('mail::message')
# Información de tu pasabordo

Hola {{$ticket->passenger_name}}, adjunto se encuentra el pasabordo para tu vuelo hacia {{ $ticket->flight->destination->city->name }}.

Tu vuelo sale desde {{ $ticket->flight->origin->city->name }} el día {{ DateHelper::beautify($ticket->flight->departure_time, 'complete_with_time') }}

Recuerda presentarlo en el aeropuerto al menos {{ $ticket->flight->is_international ? '3 horas ' : '2 horas ' }} antes de tu vuelo.

Atentamente,<br>
El equipo de Bon Voyage
@endcomponent

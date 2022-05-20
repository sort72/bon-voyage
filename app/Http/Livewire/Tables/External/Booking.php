<?php

namespace App\Http\Livewire\Tables\External;

use App\Helpers\DateHelper;
use App\Models\Cart;
use App\Models\Ticket;
use Carbon\Carbon;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Booking extends LivewireDatatable
{

    public function builder()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth()->user()->id, 'status' => 'opened']);

        // Aqui hay que hacerlo así porque al tener dos relaciones hacia destinations, LivewireDatatables muestra el mismo valor para ambos campos
        return Ticket::query()
            ->leftJoin('flights', 'flights.id', '=', 'tickets.flight_id')
            ->leftJoin('destinations as dest', 'dest.id', '=', 'flights.destination_id')
            ->leftJoin('destinations as orig', 'orig.id', '=', 'flights.origin_id')
            ->leftJoin('world_cities as destCity', 'destCity.id', '=', 'dest.city_id')
            ->leftJoin('world_cities as origCity', 'origCity.id', '=', 'orig.city_id')
            ->where('cart_id', $cart->id)
            ->where('status', 'reserved')
            ->withTrashed()
            ->orderBy('tickets.id', 'desc');

    }

    public function columns()
    {
        return [
            Column::name('reservation_code')->label('Código reserva')->searchable(),

            Column::name('origCity.name')->label('Origen')->searchable(),

            Column::name('destCity.name')->label('Destino')->searchable(),

            Column::callback(['flights.departure_time', 'orig.timezone'], function ($departure_time, $timezone) {
                return Carbon::parse($departure_time)->timezone($timezone)->format('Y-m-d H:m:s');
            })->label('Fecha del vuelo')->searchable(),

            Column::callback(['flights.departure_time', 'flights.arrival_time'], function ($departure_time, $arrival_time) {
                return Carbon::parse($departure_time)->diffInMinutes($arrival_time) . ' minutos';
            })->label('Duración')->searchable(),

            Column::callback(['passenger_name', 'passenger_surname'], function ($passenger_name, $passenger_surname) {
                return $passenger_name . ' ' . $passenger_surname;
            })->label('Nombre pasajero')->searchable(),

            Column::callback(['type'], function ($type) {
                if($type == 'economy_class') return 'Económica';
                return 'Primera clase';
            })->label('Clase')->searchable(),

            Column::callback(['price'], function ($price) {
                return currency_format($price);
            })->label('Precio')->searchable(),

            Column::callback(['created_at'], function ($created_at) {
                return DateHelper::beautify($created_at, 'short_complete_with_time');
            })->label('Fecha reservación')->searchable(),

            Column::callback(['id', 'deleted_at'], function ($id, $deleted_at) {
                if($deleted_at) return '<b>CANCELADA</b>';
                return view('components.table-booking-actions', ['id' => $id]);
            })->unsortable()
        ];
    }
}

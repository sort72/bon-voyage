<?php

namespace App\Http\Livewire\Tables;

use App\Models\Destination;
use App\Models\Flight as ModelsFlight;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Flight extends LivewireDatatable
{
    // public $model = ModelsFlight::class;

    public function builder()
    {
        // Aqui hay que hacerlo así porque al tener dos relaciones hacia destinations, LivewireDatatables muestra el mismo valor para ambos campos
        return ModelsFlight::query()
        ->leftJoin('destinations as dest', 'dest.id', '=', 'flights.destination_id')
        ->leftJoin('destinations as orig', 'orig.id', '=', 'flights.origin_id')
        ->leftJoin('world_cities as destCity', 'destCity.id', '=', 'dest.city_id')
        ->leftJoin('world_cities as origCity', 'origCity.id', '=', 'orig.city_id')
        ->orderBy('id', 'desc');
    }


    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->label('Nombre')->searchable(),

            DateColumn::name('departure_time')->format('Y-m-d H:m:s')->label('Fecha del vuelo')->searchable(),

            DateColumn::name('arrival_time')->format('Y-m-d H:m:s')->label('Fecha de aterrizaje')->searchable(),

            Column::callback(['is_international'], function ($is_international) {
                return $is_international ? 'Sí' : 'No';
            })->unsortable()->label('¿Es internacional?'),

            Column::name('origCity.name')->label('Origen')->searchable(),

            Column::name('destCity.name')->label('Destino')->searchable(),

            Column::callback(['id'], function ($id) {
                $model = ModelsFlight::find($id);
                return view('components.table-actions', ['id' => $id, 'resource' => 'flight', 'model' => $model]);
            })->unsortable()
        ];
    }

}

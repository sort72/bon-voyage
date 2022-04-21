<?php

namespace App\Http\Livewire\Tables;

use App\Models\Destination as ModelsDestination;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Destination extends LivewireDatatable
{
    public $model = ModelsDestination::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('city.name')->label('Nombre')->searchable(),

            DateColumn::name('created_at')->label('Fecha de creación'),

            Column::callback(['id'], function ($id) {
                return view('components.table-actions', ['id' => $id, 'resource' => 'destination']);
            })->unsortable()
        ];
    }
}

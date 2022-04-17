<?php

namespace App\Http\Livewire\Tables;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Administrator extends LivewireDatatable
{
    // public $model = User::class;

    public function builder()
    {
        // Aqui hay que hacerlo así porque al tener dos relaciones hacia destinations, LivewireDatatables muestra el mismo valor para ambos campos
        return User::query()
            ->where('role', 'admin');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('email')->label('Correo electrónico')->filterable()->searchable(),

            Column::name('dni')->label('Documento')->filterable()->searchable(),

            Column::callback(['name', 'surname'], function ($name, $surname) {
                return $name . ' ' . $surname;
            }),

            DateColumn::name('created_at')->label('Fecha de creación')->filterable(),

        ];
    }
}

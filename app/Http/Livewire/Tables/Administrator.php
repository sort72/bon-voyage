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
        return User::query()
            ->where('role', 'admin');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('email')->label('Correo electrónico')->searchable(),

            Column::name('dni')->label('Documento')->searchable(),

            Column::callback(['name', 'surname'], function ($name, $surname) {
                return $name . ' ' . $surname;
            })->searchable(),

            DateColumn::name('created_at')->label('Fecha de creación'),

        ];
    }
}

<?php

namespace App\Http\Livewire\Tables\External;

use App\Models\Card as ModelsCard;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Card extends LivewireDatatable
{
    public $model = ModelsCard::class;

    public function builder()
    {
        return ModelsCard::query()
            ->where('client_id', Auth()->user()->id);
    }

    public function columns()
    {
        return [
            NumberColumn::name('number')->label('Número')->searchable(),

            Column::name('holder_name')->label('Nombre titular')->searchable(),

            Column::name('expiration_date')->label('Fecha expiración')->searchable(),

            Column::name('cvc')->label('CVC')->searchable(),

            NumberColumn::name('amount')->label('Saldo')->searchable(),

            DateColumn::name('created_at')->label('Fecha creación')->searchable(),

            Column::callback(['id'], function ($id) {
                return view('components.table-actions', ['id' => $id, 'resource' => 'card']);
            })->unsortable()
        ];
    }
}

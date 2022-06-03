<?php

namespace App\Http\Livewire\Tables;

use App\Helpers\DateHelper;
use App\Models\Cart as ModelsCart;
use App\Models\Conversation as ModelsConversation;
use App\Models\Message;
use App\Models\Ticket;
use Carbon\Carbon;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Illuminate\Support\Str;


class Conversation extends LivewireDatatable
{

    public function builder()
    {
        return ModelsConversation::query()->with('client');
    }

    public function columns()
    {
        return [

            Column::callback(['created_at'], function ($date) {
                return DateHelper::beautify($date, 'short_complete_with_time');
            })->label('Fecha creación')->searchable(),

            Column::callback(['client.name', 'client.surname'], function ($name, $surname) {
                return $name . ' ' . $surname;
            })->label('Cliente')->searchable(),

            Column::callback(['id', 'client_id'], function ($id, $client_id) {
                // Workaround because using with() in builder is bugged and returns n rows for n messages within the conversation. this package sucks.
                $date = Message::where('conversation_id', $id)->orderBy('created_at', 'desc')->first()->created_at;
                return DateHelper::beautify($date, 'short_complete_with_time');
            })->label('Fecha última actualización')->searchable(),

            Column::callback(['id'], function ($id) {
                // Workaround because using with() in builder is bugged and returns n rows for n messages within the conversation. this package sucks.
                $body = Message::where('conversation_id', $id)->orderBy('created_at', 'asc')->first()->message_body;
                return Str::limit($body, 40);
            })->label('Asunto')->searchable(),

            Column::callback(['status'], function ($status) {

                switch ($status) {
                    case 'waiting_admin_response':
                        $color = "bg-yellow-400/40";
                        $text = "Cliente respondió";
                        break;

                    case 'waiting_client_response':
                        $color = "bg-sky-200";
                        $text = "Respondido";
                        break;

                    case 'closed':
                        $color = "bg-red-600 text-white";
                        $text = "Finalizada";
                        break;
                }

                $badge = "<div class='flex justify-center'><span class='{$color} rounded-xl shadow py-2 px-4 text-center mx-auto'>{$text}</span></div>";
                return $badge;
            })->label('Estado')->searchable(),

            Column::callback(['id', 'status'], function ($id, $status) {

                $eye = '<div class="flex justify-center">
                            <a href="' . route('dashboard.conversation.show', $id) . '" class="p-1 text-sky-600 hover:text-sky-500 rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>';

                return $eye;
            }),

        ];
    }
}

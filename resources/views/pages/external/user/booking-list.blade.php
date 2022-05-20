@extends('layouts.external.layout')

@section('header', 'Gestionar reservas')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-2xl font-semibold text-blue-500 px-1">Mis reservas</h3>
            <p class="px-1 mb-4">Las reservas estarán disponibles solo durante 24 horas. Paga tus vuelos para evitar perderlos.</p>
            <div class="overflow-hidden">
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.external.booking />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

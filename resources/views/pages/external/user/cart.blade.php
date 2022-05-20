@extends('layouts.external.layout')

@section('header', 'Gestionar compras')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <h3 class="text-2xl font-semibold text-blue-500 px-1">Carrito</h3>
            <p>Vuelos añadidos a tu carrito pendientes por pagar.</p>
            <div class="overflow-hidden">
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.external.cart />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

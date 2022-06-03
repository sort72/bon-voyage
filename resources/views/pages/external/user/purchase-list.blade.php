@extends('layouts.external.layout')

@section('header', 'Gestionar compras')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <h3 class="text-2xl font-semibold text-sky-500 px-1">Mis compras</h3>
            <p>Puedes realizar el checkin de tu vuelo 24 horas antes del mismo y modificar la silla.</p>
            <p class="px-1 mb-4">
                Aquí aparecen también vuelos que ya hayan pasado. Los vuelos en los que puedes realizar el checkin aparecen con un ícono
                <span class="text-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </span>
            </p>
            <div class="overflow-hidden">
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.external.purchase />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

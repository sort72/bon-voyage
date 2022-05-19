@extends('layouts.external.layout')

@section('header', 'Gestionar tarjetas')

@section('content')

<div class="container mx-auto md:flex md:flex-wrap mt-8">

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex justify-end">
                    <a class="text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600" href="{{route('external.profile.card.create')}}">Añadir tarjeta</a>
                </div>
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.external.card />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

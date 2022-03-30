@extends('layouts.dashboard.layout')

@section('header', 'Vuelos')

@section('content')

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-blue-500 hover:bg-blue-700" href="{{route('dashboard.flight.create')}}">Añadir vuelo</a>
            </div>
            <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                <livewire:tables.flight />
            </div>
        </div>
    </div>
</div>

@endsection

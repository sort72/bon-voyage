@extends('layouts.dashboard.layout')

@section('header', 'Administradores')

@section('content')

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-blue-500 hover:bg-blue-700" href="{{route('dashboard.create-admin')}}">Añadir administrador</a>
            </div>
            <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                <livewire:tables.administrator />
            </div>
        </div>
    </div>
</div>

@endsection

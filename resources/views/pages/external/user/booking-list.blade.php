@extends('layouts.external.layout')

@section('header', 'Gestionar reservas')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.external.booking />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

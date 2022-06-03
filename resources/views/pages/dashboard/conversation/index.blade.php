@extends('layouts.dashboard.layout')

@section('header', 'Listado de conversaciones')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="hidden bg-yellow-400/40 bg-sky-200 bg-red-600 "></div>
            <div class="overflow-hidden">
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.conversation />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


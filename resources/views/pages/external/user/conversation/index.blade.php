@extends('layouts.external.layout')

@section('header', 'Tus conversaciones')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h3 class="text-2xl font-semibold text-sky-500 px-1">Conversaciones</h3>
                <a href="{{ route('external.profile.conversation.create') }}" class="bgs-sky-400 bg-sky-500 hover:bg-sky-600 text-white rounded shadow py-2 px-3">Iniciar nuevo chat</a>
            </div>
            <div class="hidden bg-yellow-400/40 bg-sky-200 bg-red-600 "></div>
            <div class="overflow-hidden">
                <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                    <livewire:tables.external.conversation />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

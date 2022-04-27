@extends('layouts.dashboard.layout')

@section('header', 'Dashboard')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Bienvenid@ al panel de administración de Bon Voyage {{auth()->user()->name}}!
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.external.layout')
@section('header', 'Reservas activas')
@section('content')
<!-- <div class="w-auto h-auto bg-slate-100 overflow-hidden"> -->
<div class="container mx-auto p-8">
  <!-- Titulo  -->
  <h1 class="text-sky-700 text-2xl font-bold text-center">Resultados de la búsqueda</h1>

  <x-active-booking/>
</div>
@endsection
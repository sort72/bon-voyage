@extends('layouts.external.layout')
@section('header', 'Reservas activas')
@section('content')
@include('layouts.external.search')
<!-- <div class="w-auto h-auto bg-slate-100 overflow-hidden"> -->
<div class="container mx-auto p-8">
  <!-- Titulo  -->
  <h1 class="text-sky-700 text-2xl font-bold text-center">Resultados de la búsqueda</h1>

  @for ($index = 0; $index < $total_results; $index++)
    <x-active-booking></x-active-booking>
  @endfor
</div>
@endsection
@extends('layouts.external.layout')

@section('header', 'Bon Voyage')

@section('content')

@if ($errors->any())
    <div class="w-full bg-red-600 text-white shadow-md text-center py-2">
        <h3 class="text-white text-lg font-semibold">¡Ups! Ha ocurrido un problema al realizar la búsqueda. Por favor, valida la información suministrada:</h3>
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@include('layouts.external.search')

@if ($recommendations)
    <div class="flex justify-center my-4">
        <h3 class="text-lg md:text-3xl font-semibold pb-3">Vuelos recomendados para ti</h3>
    </div>
    <div class="flex flex-wrap mx-6 gap-y-2 gap-x-6 justify-center">
        @foreach ($recommendations as $flight)
            <x-flight-card :flight="$flight"></x-flight-card>
        @endforeach

    </div>
@endif

<div class="flex justify-center mt-4">
    <h3 class="text-lg md:text-3xl font-semibold pb-3">Últimos vuelos y promociones</h3>
</div>
<div class="flex flex-wrap mx-6 gap-y-2 gap-x-6 justify-center">
    @foreach ($flights as $flight)
        <x-flight-card :flight="$flight"></x-flight-card>
    @endforeach

</div>
<div class="flex justify-center">
    {{ $flights->links() }}
</div>
@endsection

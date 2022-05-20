@extends('layouts.external.layout')

@section('header', 'Bon Voyage')

@section('content')
@include('layouts.external.search')
<div class="lg:flex mb-6">
    @include('layouts.external.carousel')
    <div class="lg:w-1/2 w-full px-6 justify-center">
        <h3 class="text-xl text-gray-600 font-semibold mr-6 my-6">Ofertas que no te puedes perder</h3>
        <div class="rounded overflow-hidden shadow-lg mt-6 ">
            <img class="w-full" src="https://cdn.pixabay.com/photo/2016/03/04/19/36/beach-1236581_1280.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4 flex">
                <p class="w-4/5 text-gray-700 text-sm">
                    Si aún no decides tu destino, te puede interesar alguna de nuestras ofertas.
                </p>
                <div class="w-1/5">
                    <button class="mx-3 my-2 bg-sky-600 transition duration-150 ease-in-out hover:bg-sky-500 rounded-lg font-semibold text-white p-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-sky-500">Ver ofertas</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap mx-6 gap-y-2 gap-x-6 justify-center">
    @foreach ($flights as $flight)
        <x-flight-card :flight="$flight"></x-flight-card>
    @endforeach

</div>
@endsection

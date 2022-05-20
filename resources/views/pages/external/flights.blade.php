@extends('layouts.external.layout')
@section('header', 'Resultados de búsqueda')
@php
    $outbound_date = 'jue. 2 abr 2022';
    $departure_city = 'Pereira';
    $abbr_departure_city = 'PEI';
    $arrival_city = 'Cartagena de indias';
    $abbr_arrival_city = 'CTG';
    $outbound_departure_time = '17:31';
    $outbound_arrival_time = '19:31';
    $inbound_date = 'jue. 2 jun 2022';
    $inbound_departure_time = '13:31';
    $inbound_arrival_time = '18:31';
    $adult_price = '$201.001';
    $total_adults_price = '$201.001';
    $taxes = '$68.001';
    $total_price = '$268.202';
@endphp

@section('content')
    <!-- <div class="w-auto h-auto bg-slate-100 overflow-hidden"> -->
    <div class="container mx-auto p-8">
        <!-- Titulo  -->
        <h1 class="text-sky-700 text-2xl font-bold text-center">Resultados de la búsqueda</h1>

        @if ($found)
            <div class="container my-8 mx-auto bg-slate-100 overflow-hidden">
                <form action="#" method="get">
                    <div
                        class="md:grid md:grid-cols-4 divide-y-2 md:divide-y-0 md:divide-x-2 divide-solid content-center gap-4 py-4 px-4 shadow-md rounded-lg bg-white">
                        <!-- Información de vuelos -->
                        <div class="col-span-3">
                            <div class="m-2 grid grid-cols-5 content-center gap-4 px-4">
                                <!-----------------Parte superior-------------------->
                                <div class="rounded-lg bg-slate-200">
                                    <div class="p-4 tracking-wide">
                                        <div class="flex flex-row space-x-1">
                                            <h1 class="font-semibold">IDA</h1>
                                        </div>
                                        <p class="text-slate-500">{{ DateHelper::beautify($departure_time, 'complete', false) }}</p>
                                    </div>
                                </div>
                                <!-------------------------------------------------->
                                <div class="rounded-lg hover:bg-slate-300">
                                    <div class="p-4">
                                        <h1 class="font-semibold">{{ $origin_name }}</h1>
                                    </div>
                                </div>
                                <!-------------------------------------------------->
                                <div class="rounded-lg hover:bg-slate-300 overflow-hidden">
                                    <div class="p-4">
                                        <h1 class="font-semibold">{{ $destination_name }}</h1>
                                    </div>
                                </div>
                                <!-------------------------------------------------->
                                <div class="rounded-lg mt-6 ml-4">
                                    <div class="p-4">
                                        <p class="text-slate-500">Equipaje</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Borde morado -->
                            @foreach ($flights as $flight)
                                <div
                                    class="m-4 grid grid-cols-5 content-center gap-4 rounded-full px-4 outline outline-1 outline-purple-600 hover:outline-sky-700">
                                    <!-----------------Parte superior inferior-------------------->
                                    <div class="hover:bg-slate-300x rounded-full">
                                        <div class="m-4 p-4 tracking-wide">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input float-left mt-1 mr-2 h-4 w-4 appearance-none rounded-full border border-gray-300 bg-white align-top transition duration-200 checked:border-slate-600 checked:bg-blue-600 focus:outline-none"
                                                    type="radio" checked />
                                                <label class="form-check-label inline-block text-slate-800"> Bon voyage </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="hover:bg-slate-300x max-w-sm rounded-full">
                                        <div class="p-4 tracking-wide mt-4">
                                            <div class="flexx items-centerx flex flex-row space-x-10">
                                                <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->departure_time, 'time') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="hover:bg-slate-300x rounded-full ">
                                        <div class="p-4 tracking-wide flex flex-row space-x-10 mt-4">
                                            <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->arrival_time, 'time') }}</div>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="hover:bg-slate-300x rounded-full">
                                        <div class="p-4">
                                            <div class="flex justify-between content-center ml-5">
                                                <div class="text-gray-600 mt-4">
                                                    <i class="fa-solid fa-bag-shopping hover:text-sky-700"></i>
                                                    <i class="fa-solid fa-suitcase hover:text-sky-700"></i>
                                                    <i class="fa-solid fa-suitcase-rolling hover:text-sky-700"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-------------------------------------------------->
                                    <div class="hover:bg-slate-300x rounded-lg">
                                        <div class="p-4">
                                            <br />
                                            <button class="m-2 ml-10 w-full font-semibold text-slate-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($back_time)
                                <div class="m-2 grid grid-cols-5 content-center gap-4 px-4">
                                    <!-----------------Parte superior-------------------->
                                    <div class="rounded-lg bg-slate-200">
                                        <div class="p-4 tracking-wide">
                                            <div class="flex flex-row space-x-1 overflow-hidden">
                                                <h1 class="font-semibold">REGRESO</h1>
                                            </div>
                                            <p class="text-slate-500">{{ DateHelper::beautify($back_time, 'complete', false) }}</p>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="rounded-lg hover:bg-slate-300">
                                        <div class="p-4">
                                            <h1 class="font-semibold">{{ $destination_name }}</h1>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="rounded-lg hover:bg-slate-300">
                                        <div class="p-4">
                                            <h1 class="font-semibold">{{ $origin_name }}</h1>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="rounded-lg mt-6 ml-4">
                                        <div class="p-4">
                                            <p class="text-slate-500">Equipaje</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Borde morado -->
                                @foreach ($flights_back as $flight)
                                    <div
                                        class="m-4 grid grid-cols-5 content-center gap-4 rounded-full px-4 outline outline-1 outline-purple-600 hover:outline-sky-700">
                                        <!-----------------Parte superior inferior-------------------->
                                        <div class="hover:bg-slate-300x rounded-full">
                                            <div class="m-4 p-4 tracking-wide">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input float-left mt-1 mr-2 h-4 w-4 appearance-none rounded-full border border-gray-300 bg-white align-top transition duration-200 checked:border-slate-600 checked:bg-blue-600 focus:outline-none"
                                                        type="radio" checked />
                                                    <label class="form-check-label inline-block text-slate-800"> Bon voyage </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="hover:bg-slate-300x max-w-sm rounded-full">
                                            <div class="p-4 tracking-wide mt-4">
                                                <div class="flexx items-centerx flex flex-row space-x-10">
                                                    <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->departure_time, 'time') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="hover:bg-slate-300x rounded-full ">
                                            <div class="p-4 tracking-wide flex flex-row space-x-10 mt-4">
                                                <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->arrival_time, 'time') }}</div>
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="hover:bg-slate-300x rounded-full">
                                            <div class="p-4">
                                                <div class="flex justify-between content-center ml-5">
                                                    <div class="text-gray-600 mt-4">
                                                        <i class="fa-solid fa-bag-shopping hover:text-sky-700"></i>
                                                        <i class="fa-solid fa-suitcase hover:text-sky-700"></i>
                                                        <i class="fa-solid fa-suitcase-rolling hover:text-sky-700"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-------------------------------------------------->
                                        <div class="hover:bg-slate-300x rounded-lg">
                                            <div class="p-4">
                                                <br />
                                                <button class="m-2 ml-10 w-full font-semibold text-slate-500">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-------------------------Precios----------------------------------->
                        <div class="p-4">
                            <h1 class="text-right text-slate-600">Precio por adulto</h1>
                            <h1 class="text-right text-2xl text-slate-600">{{ $adult_price }}</h1>
                            <div class="grid grid-cols-2 content-center gap-2 mt-4">
                                <div class="text-left text-sm text-slate-500">1 Adulto</div>
                                <div class="text-right text-sm text-slate-500">{{ $total_adults_price }}</div>

                                <div class="text-left text-sm text-slate-500">Impuesto, tasas y cargos</div>
                                <div class="text-right text-sm text-slate-500">{{ $taxes }}</div>

                            </div>

                            <hr class="mt-2" />

                            <div class="mt-10 grid grid-cols-2 content-center gap-2">
                                <div class="text-left text-lg text-slate-600">
                                    <strong> Precio final </strong>
                                </div>
                                <div class="text-right text-lg text-slate-600">
                                    <strong>{{ $total_price }}</strong>
                                </div>
                            </div>
                            <div class="flex justify-between flex-wrap">
                                <button
                                    class="m-2 w-full rounded-full bg-blue-600 p-2 font-semibold text-white">Reservar</button>
                                <button
                                class="m-2 w-full rounded-full bg-green-600 p-2 font-semibold text-white">Comprar</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        @else
            <h3 class="text-red-500 text-xl font-semibold text-center">
                No se han encontrado vuelos. Por favor, inténtalo de nuevo utilizando otros criterios de búsqueda.
            </h3>
        @endif


    </div>
@endsection

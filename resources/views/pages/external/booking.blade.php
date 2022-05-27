@extends('layouts.external.layout')

@section('header', 'Gestionar reserva')

@section('content')

    <div class="container mx-auto md:flex md:flex-wrap mt-8">
        <!-- contenedor información de reserva -->
        <div class="md:w-3/5 px-12 mb-12">
            <h1 class="text-xl truncate font-bold text-sky-700">
                Complete la siguiente información de reserva
            </h1>
            <form method="POST" action="{{ route('external.booking-data') }}" class="overflow-hidden grid gap-3">
                @csrf
                @for ($index = 0; $index < $number_of_adults; $index++)
                    <x-adult-ticket-form-fields :adultNumber="$index" />
                @endfor

                @for ($index = 0; $index < $number_of_children; $index++)
                    <x-child-ticket-form-fields :childNumber="$index" />
                @endfor

                <input hidden name="flight_id" value="{{ $flight->id }}">
                <input hidden name="inbound_flight_id" value="{{ $inbound_flight ? $inbound_flight->id : '' }}">
                <input hidden name="flight_class" value="{{ $class }}">

                <div class="flex justify-self-center items-center">
                    <input class="rounded-md" name="agreement" id="agreement" required type="checkbox">
                    <label for="agreement" class="block text-sm ml-3">Leí y acepto las condiciones de compra, políticas de
                        privacidad y políticas de cambio y cancelaciones.</label>
                </div>

                <button class="rounded-xl bg-red-500 hover:bg-red-600 text-2xl p-2 text-white justify-self-center mt-2"
                    type="submit">Realizar reserva</button>
            </form>
        </div>

        <!-- contenedor detalle de pago y detalle de la compra -->
        <div class="md:w-2/5 px-6 mb-12">
            <!-- Contenedor detalle del pago -->
            <div class="mb-6">
                <div>
                    <h1 class="mb-3 text-xl font-bold text-sky-700">Detalle del pago</h1>
                </div>

                <!-- Cuadro informacion -->
                <div class="border-2 border-gray-400 bg-white rounded-xl shadow-md p-4 overflow-hidden">
                    <div class="font-semibold text-xs text-gray-600">
                        <div class="grid grid-cols-2 mb-3">
                            <span>Valor por persona</span>
                            <span class="justify-self-end">{{ currency_format($one_person_value) }}</span>
                        </div>

                    </div>

                    <hr class="border-gray-400 my-3" />

                    <div class="grid grid-cols-2 -mb-2 text-gray-600">
                        <span class="font-semibold text-sm ml-1">TOTAL</span>
                        <span class="font-bold text-xl justify-self-end">{{ currency_format($one_person_value * $passengers) }}</span>
                    </div>
                </div>
            </div>

            <!-- Contenedor detalle de la compra -->
            <div>
                <div>
                    <h1 class="mb-3 text-xl font-bold text-sky-700">
                        Detalle de la reserva
                    </h1>
                </div>

                <!-- Cuadro de informacion -->
                <div
                    class="grid grid-cols-1 gap-y-6 text-gray-600 border-2 border-gray-400 bg-white shadow-md rounded-xl p-4 overflow-hidden">
                    <div>
                        <div class="text-sky-700 text-xl">
                            <i class="block fa-solid fa-plane"></i>
                        </div>
                        <span class="block font-bold text-xl">{{ $flight->origin->city->name }} ->
                            {{ $flight->destination->city->name }}</span>
                        <span class="font-semibold text-sm text-gray-400">{{ $inbound_flight ? 'Ida y vuelta' : 'Sólo ida' }}, {{ $number_of_adults }} adulto(s)
                            @if ($number_of_children > 0)
                                y {{ $number_of_children }} niño(s)
                            @endif
                        </span>
                    </div>

                    <div>
                        <span class="block font-semibold text-sm text-gray-400">IDA</span>
                        <span
                            class="font-semibold text-lg">{{ DateHelper::beautify($flight->departure_time, 'complete') }}</span>
                    </div>


                    <!-- Información de hora de salia tipo de vuelo hora de llegada y duración -->
                    <div>
                        <div class="grid grid-cols-2 items-center -mt-2 mb-4">
                            <span><img class="h-5 w-auto" src="{{ asset('images/logo.png') }}"
                                    alt="logo_bon_voyage"></span>
                        </div>

                        <div class="flex flex-wrap justify-between">
                            <div>
                                <span class="uppercase font-semibold text-gray-400">ORIGEN</span>
                                <span
                                    class="block font-bold">{{ DateHelper::beautify($flight->departure_time, 'time') }}</span>
                            </div>
                            <div class="font-semibold underline underline-offset-8 text-sky-700">Directo</div>
                            <div>
                                <span class="uppercase font-semibold text-gray-400">DESTINO</span>
                                <span
                                    class="block font-bold">{{ DateHelper::beautify($flight->arrival_time, 'time') }}</span>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-400">Duración</span>
                                <span class="block font-bold">{{ $flight->duration }} minutos</span>
                            </div>
                        </div>

                        <div class="text-gray-600 mt-4">
                            <i class="fa-solid fa-bag-shopping hover:text-sky-700"></i>
                            <i class="fa-solid fa-suitcase hover:text-sky-700"></i>
                            <i class="fa-solid fa-suitcase-rolling hover:text-sky-700"></i>
                        </div>
                    </div>

                    @if ($inbound_flight)
                        <hr class="border-gray-400" />
                        <div>
                            <div class="text-sky-700 text-xl">
                                <i class="block rotate-180 fa-solid fa-plane"></i>
                            </div>
                            <span class="block font-bold text-xl">{{ $inbound_flight->origin->city->name }} ->
                                {{ $inbound_flight->destination->city->name }}</span>
                            <span class="block font-semibold text-sm text-gray-400 pt-3">VUELTA</span>
                            <span class="font-semibold text-lg">{{ DateHelper::beautify($inbound_flight->departure_time, 'complete') }}</span>
                        </div>
                        <!-- Información de hora de salida tipo de vuelo hora de llegada y duración -->
                        <div>
                            <div class="grid grid-cols-2 items-center -mt-2 mb-4">
                                <span><img class="h-5 w-auto" src="{{ asset('images/logo.png') }}"
                                        alt="logo_bon_voyage"></span>
                            </div>

                            <div class="flex flex-wrap justify-between">
                                <div>
                                    <span class="uppercase font-semibold text-gray-400">ORIGEN</span>
                                    <span class="block font-bold">{{DateHelper::beautify($inbound_flight->departure_time, 'time') }}</span>
                                </div>
                                <div class="font-semibold underline underline-offset-8 text-sky-700">Directo</div>
                                <div>
                                    <span class="uppercase font-semibold text-gray-400">DESTINO</span>
                                    <span class="block font-bold">{{ DateHelper::beautify($inbound_flight->arrival_time, 'time') }}</span>
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-400">Duración</span>
                                    <span class="block font-bold">{{ $inbound_flight->duration }} minutos</span>
                                </div>
                            </div>

                            <div class="text-gray-600 mt-4">
                                <i class="fa-solid fa-bag-shopping hover:text-sky-700"></i>
                                <i class="fa-solid fa-suitcase hover:text-sky-700"></i>
                                <i class="fa-solid fa-suitcase-rolling hover:text-sky-700"></i>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.external.layout')
@section('header', 'Resultados de búsqueda')

@section('content')
    <!-- <div class="w-auto h-auto bg-slate-100 overflow-hidden"> -->
    <div class="container mx-auto p-8">
        <!-- Titulo  -->
        <h1 class="text-sky-700 text-2xl font-bold text-center">Resultados de la búsqueda</h1>

        @if ($found == 1)
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
                                                    type="radio" onclick="changePrices({{$flight->id}},{{$flight->economy_class_price}},{{$flight->first_class_price}},this)" />
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
                                                        type="radio" onclick="changePrices({{$flight->id}},{{$flight->economy_class_price}},{{$flight->first_class_price}},this)" />
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
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="p-4">
                            <div class="grid justify-items-stretch">
                                <h1 class="text-right text-slate-600">Precio por adulto</h1>
                                <input class="justify-self-end text-right text-2xl text-slate-600 focus:outline-none w-1/2 " readonly id="adult_price"/></input>
                            </div>

                            <div class="grid grid-cols-2 content-center gap-2 mt-4">
                                <div class="text-left text-sm text-slate-500">{{$adults_count}} Adulto @if($adults_count > 1) s @endif</div>
                                <input class="text-right text-sm text-slate-500 focus:outline-none" id="total_adults"/>
                            </div>
                            @if($kids_count>0)
                            <div class="grid justify-items-stretch">
                                <h1 class="text-right text-slate-600">Precio por Niño</h1>
                                <input class="justify-self-end text-right text-2xl text-slate-600 focus:outline-none w-1/2 " readonly id="kid_price"/></input>
                            </div>

                            <div class="grid grid-cols-2 content-center gap-2 mt-4">
                                <div class="text-left text-sm text-slate-500">{{$kids_count}} Niño @if($adults_count > 1) s @endif</div>
                                <input class="text-right text-sm text-slate-500 focus:outline-none" id="total_kids"/>
                            </div>
                            @endif
                            <hr class="mt-2" />

                            <div class="my-6 grid grid-cols-2 content-center gap-2">
                                <div class="text-left text-lg text-slate-600">
                                    <strong> Precio final </strong>
                                </div>
                                <div class="">
                                    <strong><input class="text-right text-2xl text-slate-600 focus:outline-none w-full" readonly id="total"/></strong>
                                </div>
                            </div>
                            <div class="flex justify-between flex-wrap">
                                <a href="#" id="reservation" class="text-center m-2 w-full rounded-full bg-sky-600 p-2 font-semibold hover:bg-sky-500 text-white">Reservar</a>
                                <a href="#" id="purchase" class="m-2 w-full rounded-full bg-green-600 hover:bg-green-500 p-2 font-semibold text-white">Comprar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-8 mx-auto w-1/2" role="alert">
                <strong class="font-bold">Lo sentimos!</strong>
                <span class="block sm:inline">No se han encontrado vuelos. Por favor, inténtalo de nuevo utilizando otros criterios de búsqueda.</span>
            </div>
        @endif


    </div>
@push('scripts')
<script>
    function changePrices(flight_id,economy_class_price,first_class_price,input,inbound_flight_id=''){

        adult_price_input = document.getElementById('adult_price');
        total_adults_input = document.getElementById('total_adults');
        kid_price_input = document.getElementById('kid_price');
        total_kids_input = document.getElementById('total_kids');
        total_input = document.getElementById('total');
        reservation = document.getElementById('reservation');
        purchase = document.getElementById('purchase');

        var flight_class = '{{$flight_class}}'
        var flight_price = (flight_class== 'economy_class') ? economy_class_price : first_class_price;
        var total_number_adults = {{$adults_count}};
        var total_adults = flight_price * total_number_adults;
        var total_number_kids = {{$kids_count}};
        var total_kids = flight_price * total_number_kids;
        var total_passengers = total_number_adults + total_number_kids

        adult_price_input.value = flight_price
        total_adults_input.value = total_adults

        if(total_number_kids)
        {
            kid_price_input.value = flight_price
            total_kids_input.value = total_kids
            total_input.value = total_adults + total_kids
        }


        var url_reservation =  '{!! route('external.booking') !!}?flight_id=' + flight_id + '&adults_count=' + total_number_adults + '&kids_count=' + total_number_kids + '&flight_class=' + flight_class+ '&passengers=' + total_passengers + '&inbound_flight_id=' +inbound_flight_id
        reservation.href = url_reservation

        var url_purchase =  '{!! route('external.purchase') !!}?flight_id=' + flight_id + '&adults_count=' + total_number_adults + '&kids_count=' + total_number_kids + '&flight_class=' + flight_class+ '&passengers=' + total_passengers + '&inbound_flight_id=' +inbound_flight_id
        purchase.href = url_purchase
    }
</script>

@endpush
@endsection

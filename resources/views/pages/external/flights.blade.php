@extends('layouts.external.layout')
@section('header', 'Resultados de búsqueda')

@section('content')
    <!-- <div class="w-auto h-auto bg-slate-100 overflow-hidden"> -->
    <div class="container mx-auto p-8">
        <!-- Titulo  -->
        <h1 class="text-sky-700 text-2xl font-bold text-center">Resultados de la búsqueda</h1>
        @if ($found == 1)
            <div class="container my-8 mx-auto bg-slate-100 overflow-hidden flex flex-col gap-8">
                @foreach ($results as $key => $result)
                    <form id="{{ $key }}" action="#" method="get">
                        <div
                            class="md:grid md:grid-cols-4 divide-y-2 md:divide-y-0 md:divide-x-2 divide-solid content-center gap-4 py-4 px-4 shadow-md rounded-lg bg-white">
                            <!-- Información de vuelos -->
                            <div class="col-span-3">
                                <div class="m-2 grid grid-cols-2 md:grid-cols-5 content-center gap-4 px-4">
                                    <!-----------------Parte superior-------------------->
                                    <div class="rounded-lg bg-slate-200 md:col-span-2">
                                        <div class="p-4 tracking-wide">
                                            <div class="flex flex-row space-x-1">
                                                <h1 class="font-semibold">IDA</h1>
                                            </div>
                                            {{-- <p class="text-slate-500">{{ DateHelper::beautify($result['date'], 'complete', false) }}</p> --}}
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="rounded-lg hover:bg-slate-300">
                                        <div class="p-4">
                                            <h1 class="font-semibold">{{ $result['origin_name'] }}</h1>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------->
                                    <div class="rounded-lg hover:bg-slate-300 overflow-hidden">
                                        <div class="p-4">
                                            <h1 class="font-semibold">{{ $result['destination_name'] }}</h1>
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
                                @foreach ($result['outbound_flights'] as $flight)
                                    <div
                                        class="m-4 grid grid-cols-2 md:grid-cols-5 content-center md:gap-4 rounded-lg md:rounded-full px-4 outline outline-1 outline-purple-600 hover:outline-sky-700">
                                        <!-----------------Parte superior inferior-------------------->
                                        <div class="hover:bg-slate-300x rounded-full md:col-span-2">
                                            <div class="m-4 p-4 tracking-wide">
                                                <div class="form-check">
                                                    <input
                                                        id="flight_{{ $flight->id }}" name="input_outbund" checked
                                                        value="{{ $flight->id }}"
                                                        data-economy-price="{{$flight->discounted_economy}}"
                                                        data-business-price="{{$flight->discounted_business}}"
                                                        class="form-check-input input_outbund float-left mt-1 mr-2 h-4 w-4 appearance-none rounded-full border border-gray-300 bg-white align-top transition duration-200 checked:border-slate-600 checked:bg-blue-600 focus:outline-none"
                                                        type="radio" onclick="changePrices('{{$key}}', {{$flight->id}},{{$flight->discounted_economy}},{{$flight->discounted_business}}, {{ $flight->discount }},this)" />
                                                    <label for="flight_{{ $flight->id }}" class="form-check-label inline-block text-slate-800"> {{ DateHelper::beautify($flight->departure_time, 'complete', $flight->origin->timezone) }} </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="hover:bg-slate-300x max-w-sm rounded-full">
                                            <div class="p-4 tracking-wide mt-4">
                                                <div class="flexx items-centerx flex flex-row space-x-10">
                                                    <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->departure_time, 'time', $flight->origin->timezone) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="hover:bg-slate-300x rounded-full ">
                                            <div class="p-4 tracking-wide flex flex-row space-x-10 mt-4">
                                                <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->arrival_time, 'time', $flight->destination->timezone) }}</div>
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

                                @if ($result['return_flights'])
                                    <div class="m-2 grid grid-cols-2 md:grid-cols-5 content-center gap-4 px-4">
                                        <!-----------------Parte superior-------------------->
                                        <div class="rounded-lg bg-slate-200 md:col-span-2">
                                            <div class="p-4 tracking-wide">
                                                <div class="flex flex-row space-x-1 overflow-hidden">
                                                    <h1 class="font-semibold">REGRESO</h1>
                                                </div>
                                                {{-- <p class="text-slate-500">{{ DateHelper::beautify($back_time, 'complete', false) }}</p> --}}
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="rounded-lg hover:bg-slate-300">
                                            <div class="p-4">
                                                <h1 class="font-semibold">{{ $result['origin_name'] }}</h1>
                                            </div>
                                        </div>
                                        <!-------------------------------------------------->
                                        <div class="rounded-lg hover:bg-slate-300">
                                            <div class="p-4">
                                                <h1 class="font-semibold">{{ $result['destination_name'] }}</h1>
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
                                    @foreach ($result['return_flights'] as $flight)
                                        <div
                                            class="m-4 grid grid-cols-2 md:grid-cols-5 content-center md:gap-4 rounded-lg md:rounded-full px-4 outline outline-1 outline-purple-600 hover:outline-sky-700">
                                            <!-----------------Parte superior inferior-------------------->
                                            <div class="hover:bg-slate-300x rounded-full md:col-span-2">
                                                <div class="m-4 p-4 tracking-wide">
                                                    <div class="form-check">
                                                        <input
                                                            id="flight_{{ $flight->id }}" name="input_return" checked
                                                            value="{{ $flight->id }}"
                                                            data-economy-price="{{$flight->discounted_economy}}"
                                                            data-business-price="{{$flight->discounted_business}}"
                                                            class="form-check-input input_return float-left mt-1 mr-2 h-4 w-4 appearance-none rounded-full border border-gray-300 bg-white align-top transition duration-200 checked:border-slate-600 checked:bg-blue-600 focus:outline-none"
                                                            type="radio"  onclick="changePrices('{{$key}}', 0,{{$flight->discounted_economy}},{{$flight->discounted_business}}, {{ $flight->discount }},this, {{$flight->id}})" />
                                                        <label for="flight_{{ $flight->id }}" class="form-check-label inline-block text-slate-800"> {{ DateHelper::beautify($flight->departure_time, 'complete', $flight->origin->timezone) }} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-------------------------------------------------->
                                            <div class="hover:bg-slate-300x max-w-sm rounded-full">
                                                <div class="p-4 tracking-wide mt-4">
                                                    <div class="flexx items-centerx flex flex-row space-x-10">
                                                        <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->departure_time, 'time', $flight->origin->timezone) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-------------------------------------------------->
                                            <div class="hover:bg-slate-300x rounded-full ">
                                                <div class="p-4 tracking-wide flex flex-row space-x-10 mt-4">
                                                    <div class="text-lg font-semibold">{{ DateHelper::beautify($flight->arrival_time, 'time', $flight->destination->timezone) }}</div>
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
                                    <input class="justify-self-end text-right text-2xl text-slate-600 focus:outline-none w-1/2 adult_price" readonly/></input>
                                </div>

                                <div class="grid grid-cols-2 content-center gap-2 mt-4">
                                    <div class="text-left text-sm text-slate-500">{{$adults_count}} Adulto @if($adults_count > 1)s @endif</div>
                                    <input class="text-right text-sm text-slate-500 focus:outline-none total_adults"/>
                                </div>
                                @if($kids_count>0)
                                <div class="grid justify-items-stretch">
                                    <h1 class="text-right text-slate-600">Precio por Niño</h1>
                                    <input class="justify-self-end text-right text-2xl text-slate-600 focus:outline-none w-1/2 kid_price" readonly/></input>
                                </div>

                                <div class="grid grid-cols-2 content-center gap-2 mt-4">
                                    <div class="text-left text-sm text-slate-500">{{$kids_count}} Niño @if($adults_count > 1)s @endif</div>
                                    <input class="text-right text-sm text-slate-500 focus:outline-none total_kids"/>
                                </div>
                                @endif
                                <hr class="mt-2" />

                                <div class="my-6 grid grid-cols-2 content-center gap-2">
                                    <div class="text-left text-lg text-slate-600">
                                        <strong> Precio final </strong>
                                    </div>
                                    <div class="">
                                        <strong><input class="text-right text-2xl text-slate-600 focus:outline-none w-full total" readonly/></strong>
                                    </div>
                                </div>

                                <div class="my-6 content-center bg-yellow-400 text-gray-900 py-2 px-3 shadow rounded hidden has_discount">
                                    ¡Este trayecto tiene un descuento aplicado!
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <a href="#" class="text-center m-2 w-full rounded-full bg-sky-600 p-2 font-semibold hover:bg-sky-500 text-white reservation">Reservar</a>
                                    <a href="#" class="text-center m-2 w-full rounded-full bg-green-600 hover:bg-green-500 p-2 font-semibold text-white purchase">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach

            </div>
        @else
            @include('layouts.external.search')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-8 mx-auto w-1/2" role="alert">
                <strong class="font-bold">¡Lo sentimos!</strong>
                <span class="block sm:inline">No se han encontrado vuelos. Por favor, inténtalo de nuevo utilizando otros criterios de búsqueda.</span>
            </div>
        @endif


    </div>
@push('scripts')
<script>
    window.addEventListener("load", function(event) {
        var radios = document.getElementsByClassName('form-check-input')
        var inputs_checked = Array.prototype.filter.call(radios, function(radio){
            return radio.checked;
        });

        inputs_checked.forEach(function(element){
            element.onclick()
        })
    });

    function changePrices(form_id,flight_id,economy_class_price,first_class_price,discount,input,inbound_flight_id='')
    {

        form = document.getElementById(form_id)
        total_adults_input = form.getElementsByClassName('total_adults')[0];
        adult_price_input = form.getElementsByClassName('adult_price')[0];
        kid_price_input = form.getElementsByClassName('kid_price')[0];
        total_kids_input = form.getElementsByClassName('total_kids')[0];
        total_input = form.getElementsByClassName('total')[0];
        reservation = form.getElementsByClassName('reservation')[0];
        purchase = form.getElementsByClassName('purchase')[0];
        has_discount = form.getElementsByClassName('has_discount')[0];

        var flight_class = '{{$flight_class ?? "economy_class"}}'
        var flight_price = (flight_class== 'economy_class') ? economy_class_price : first_class_price;
        var total_number_adults = parseInt("{{$adults_count ?? 1}}");
        var total_number_kids = parseInt("{{$kids_count ?? 0}}");
        var total_passengers = total_number_adults + total_number_kids

        if(flight_id == 0)
        {
            const inbound =  Array.prototype.filter.call(form.getElementsByClassName('input_outbund'), function(radio){
                    return radio.checked;
                })[0];

            flight_id = inbound.value
            var inbound_price = (flight_class== 'economy_class') ? inbound.getAttribute('data-economy-price') : inbound.getAttribute('data-economy-price')
            flight_price += parseInt(inbound_price)
        }
        else if(inbound_flight_id == '')
        {
            const back = Array.prototype.filter.call(form.getElementsByClassName('input_return'), function(radio){
                    return radio.checked;
                })[0];

            if(back) {
                inbound_flight_id = back.value
                var back_price = (flight_class== 'economy_class') ? back.getAttribute('data-economy-price') : back.getAttribute('data-economy-price')
                flight_price += parseInt(back_price)
            }
        }

        var total_adults = flight_price * total_number_adults
        var total_kids = flight_price * total_number_kids

        adult_price_input.value = currency_format(flight_price)
        total_adults_input.value = currency_format(total_adults)
        total_input.value = currency_format(total_adults)

        if(total_number_kids > 0)
        {
            kid_price_input.value = currency_format(flight_price)
            total_kids_input.value = currency_format(total_kids)
            total_input.value = currency_format(total_adults + total_kids)
        }

        if(discount > 0)
        {
            has_discount.classList.remove("hidden")
        }
        else has_discount.classList.add("hidden")




        var url_reservation =  '{!! route('external.booking') !!}?flight_id=' + flight_id + '&adults_count=' + total_number_adults + '&kids_count=' + total_number_kids + '&flight_class=' + flight_class+ '&passengers=' + total_passengers + '&inbound_flight_id=' +inbound_flight_id
        reservation.href = url_reservation

        var url_purchase =  '{!! route('external.purchase') !!}?flight_id=' + flight_id + '&adults_count=' + total_number_adults + '&kids_count=' + total_number_kids + '&flight_class=' + flight_class+ '&passengers=' + total_passengers + '&inbound_flight_id=' +inbound_flight_id
        purchase.href = url_purchase
    }

    function currency_format(amount)
    {
        return '$' + amount.toLocaleString('es-CO')

    }
</script>

@endpush
@endsection

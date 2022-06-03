@extends('layouts.external.layout')

@section('header', 'Gestionar compras')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="">
                <h3 class="text-2xl font-semibold text-sky-500 px-1">Carrito</h3>
                <p>Vuelos añadidos a tu carrito pendientes por pagar.</p>
                <div class="overflow-hidden">
                    <div class="px-1 border-b border-gray-200 sm:rounded-lg shadow-md">
                        <livewire:tables.external.cart />
                    </div>
                </div>
            </div>
            <form method="POST"
            action="{{ route('external.profile.payCart') }}">
            @csrf
            <div class="px-10 mt-10 grid grid-cols-4">
                <div class="bg-sky-500 rounded grid grid-cols-2 py-8 col-span-4">
                    <div class="flex flex-wrap items-center mx-6 text-xl">
                        <i class="fa-solid fa-dollar-sign rounded-full bg-white text-sky-500  py-2 px-3"></i>
                        <p class="text-white uppercase font-bold mx-2">Total a pagar</p>
                    </div>
                    <div class="justify-self-end mx-6 text-white flex flex-wrap items-center text-xl">
                        <i class="fa-solid fa-dollar-sign"></i>
                        @php
                            $total = 0;
                            foreach($cart->tickets as $ticket)
                            {
                                $total += $ticket->price;
                            }
                        @endphp
                        <p class="uppercase font-bold mx-2 text-2xl">{{$total}}</p>
                        <input name="total" value="{{$total}}" hidden />
                    </div>
                </div>
                <div class="col-start-2 col-span-2 grid border-2 border-gray-400 bg-white rounded-xl shadow-md p-4 overflow-hidden justify-items-center my-10" x-data="{ show: true }">
                    <p class="mt-0 text-center sm:text-xl md:text-2xl mb-4 font-bold leading-tight text-sky-500">¿Cómo deseas pagar?</p>
                    <div class="flex items-center">
                        <div class="bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">
                            <input aria-labelledby="label1" checked type="radio" name="radio" class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 focus:outline-none text-sky-500 border rounded-full border-gray-400 absolute cursor-pointer w-full h-full checked:border-none" @click="show = true" />
                            <div class="check-icon hidden border-4 border-sky-500 rounded-full w-full h-full z-1"></div>
                        </div>
                        <label id="label1" class="ml-2 text-sm leading-4 font-normal">Débito</label>
                        <div class="ml-4  bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">
                            <input aria-labelledby="label2" type="radio" name="radio" class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 focus:outline-none border rounded-full text-sky-500 border-gray-400 absolute cursor-pointer w-full h-full checked:border-none" @click="show = false" />
                            <div class="check-icon hidden border-4 border-sky-500 rounded-full w-full h-full z-1"></div>
                        </div>
                        <label id="label2" class="ml-2 text-sm leading-4 font-normal">Crédito</label>
                    </div>
                    <div x-show="show">
                        <p class="text-center text-gray-600 font-bold mt-6">Tus tarjetas Débito</p>
                        <select name="card" id="card"
                            class="iblock my-4 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                            <option value="">Seleccione</option>
                            @foreach ($debit_cards as $card)
                            <option value="{{$card->id}}">@if($card->number[0] == '3') AMEX @elseif ($card->number[0] == '4') VISA @elseif ($card->number[0] == '5') MASTERCARD @else OTRO @endif***{{substr($card->number,-4)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div x-show="!show">
                        <p class="text-center text-gray-600 font-bold mt-6">Tus tarjetas Crédito</p>
                        <select name="card" id="card"
                            class="iblock my-4 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                            <option value="">Seleccione</option>
                            @foreach ($credit_cards as $card)
                            <option value="{{$card->id}}">@if($card->number[0] == '3') AMEX @elseif ($card->number[0] == '4') VISA @elseif ($card->number[0] == '5') MASTERCARD @else OTRO @endif***{{substr($card->number,-4)}}</option>
                            @endforeach
                        </select>
                        <p class="text-center text-gray-600 font-bold mt-6">Cuotas</p>
                        <select name="fees" class="iblock my-4 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                            <option value="">Seleccione</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="6">6</option>
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button class="rounded-xl bg-green-500 hover:bg-green-600 text-2xl p-2 text-white mt-2 mb-6"
                type="submit">Realizar pago</button>
            </div>
            </form>


        </div>
    </div>
</div>

@push('scripts')
<script>
    function deleteItem(itemId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            type: 'POST',
            url: '{{ route('external.profile.deleteItem','+itemId+') }}',
        })
        .done(function (data) {
            console.log(data)
         }).error(function (err) {
            // DO SOMETHING OR NOT
         });
    }

</script>
@endpush

@endsection

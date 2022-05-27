@extends('layouts.external.layout')

@section('header', 'Gestionar compras')

@section('content')

<div class="container mx-auto mt-8">

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="">
                <h3 class="text-2xl font-semibold text-blue-500 px-1">Carrito</h3>
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
            <div class="px-10 my-10 grid grid-cols-4">
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
                <div class="col-start-2 col-span-2 grid border-2 border-gray-400 bg-white rounded-xl shadow-md p-4 overflow-hidden justify-items-center my-10">
                    <p class="mt-0 text-center sm:text-xl md:text-2xl mb-4 font-bold leading-tight text-sky-500">¿Cómo deseas pagar?</p>
                    <p class="text-center text-gray-600 font-bold mt-6">Tus tarjetas Débito/Crédito</p>
                    <select name="card" id="card"
                        class="iblock my-4 w-1/3 rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                        <option value="">Seleccione</option>
                        @foreach ($cards as $card)
                        <option value="{{$card->id}}">{{$card->type}}***{{substr($card->number,-4)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="rounded-xl bg-green-500 hover:bg-green-600 text-2xl p-2 text-white justify-self-center mt-2"
            type="submit">Añadir al carrito</button>
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

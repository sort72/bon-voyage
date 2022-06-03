@extends('layouts.external.layout')

@section('header', 'Modificar tarjeta')

@section('content')

<div class="container mx-auto mt-8">
    <div>
        <div class="flex justify-between">
            <h3 class="text-sky-400 text-3xl font-semibold">Modificar tarjeta</h3>
            <a class="text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-700" href="{{route('external.profile.card.index')}}">Volver al listado</a>
        </div>
        <div class="p-5 mt-4 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
            <form method="POST" action="{{route('external.profile.card.update', $card)}}">
                @method("PATCH")
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="mt-5">
                        <x-label>Número de tarjeta</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="number" min="0" required step="1" type="number" value="{{old('number', $card->number)}}" />
                        @error('number') <span class="text-red-500 font-semibold">{{$errors->first('number')}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>CVC</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="cvc" min="100" max="999" required step="1" type="number" value="{{old('cvc', $card->cvc)}}" />
                        @error('cvc') <span class="text-red-500 font-semibold">{{$errors->first('cvc')}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>Fecha de expiración</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1 cursor-pointer flatpickr-month-select" name="expiration_date" required type="text" />
                        @error('expiration_date') <span class="text-red-500 font-semibold">{{$errors->first('expiration_date')}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>Saldo</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="amount" min="0" required step="1" type="number" value="{{old('amount', $card->amount)}}" />
                        @error('amount') <span class="text-red-500 font-semibold">{{$errors->first('amount')}}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <x-label>Titular de la tarjeta</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="holder_name" required type="text" value="{{old('holder_name', $card->holder_name)}}" />
                        @error('holder_name') <span class="text-red-500 font-semibold">{{$errors->first('holder_name')}}</span> @enderror
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class=" my-2 text-white py-2 px-5 rounded bg-sky-700 hover:bg-sky-800">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
         window.addEventListener("load", function(event) {
             const fp = document.querySelector(".flatpickr-month-select")._flatpickr;
             fp.setDate("{{old('expiration_date', $card->expiration_date)}}", true)
         })
    </script>
@endpush

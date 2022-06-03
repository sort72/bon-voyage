@extends('layouts.external.layout')

@section('header', 'Añadir tarjeta')

@section('content')

<div class="container mx-auto mt-8">
    <div>
        <div class="flex justify-center">
            <h3 class="text-sky-500 text-3xl font-semibold">Añadir tarjeta</h3>
        </div>
        <div class="p-5 mt-4 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md my-4">
            <form method="POST" action="{{route('external.profile.card.store')}}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="md:col-span-2">
                        <x-label>Titular de la tarjeta</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="holder_name" required type="text" value="{{old('holder_name')}}" />
                        @error('holder_name') <span class="text-red-500 font-semibold">{{$errors->first('holder_name')}}</span> @enderror
                    </div>
                    <div class="mt-5">
                        <x-label>Número de tarjeta</x-label>
                        <div class="flex items-center">
                            <input class="mt-1 w-full border border-gray-300 rounded-md p-1 mx-2" name="number" id="card_number" oninput="card_type(this.value)" min="0" required step="1" type="number" value="{{old('number')}}" />
                            <i class="fa-brands fa-cc-visa" id="visa" style="display:none"></i>
                            <i class="fa-brands fa-cc-mastercard" id="mastercard" style="display:none"></i>
                            <i class="fa-brands fa-cc-amex" id="amex" style="display:none"></i>
                        </div>

                        @error('number') <span class="text-red-500 font-semibold">{{$errors->first('number')}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>CVC</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="cvc" min="100" max="999" required step="1" type="number" value="{{old('cvc')}}" />
                        @error('cvc') <span class="text-red-500 font-semibold">{{$errors->first('cvc')}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>Fecha de expiración</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1 cursor-pointer flatpickr-month-select" name="expiration_date" required type="text" value="{{old('expiration_date')}}" />
                        @error('expiration_date') <span class="text-red-500 font-semibold">{{$errors->first('expiration_date')}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>Saldo</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="amount" min="0" required step="1" type="number" value="{{old('amount')}}" />
                        @error('amount') <span class="text-red-500 font-semibold">{{$errors->first('amount')}}</span> @enderror
                    </div>

                    <div class="mt-5 md:col-span-2">
                        <x-label>Tipo</x-label>
                        <select name="type" id="type"
                            class="iblock mt-1 w-1/2 rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                            <option value="">Seleccione</option>
                            <option value="credit">Crédito</option>
                            <option value="debit">Débito</option>
                        </select>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class=" my-2 w-24 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Añadir</button>
                    </div>
                    <div class="mt-5 text-center flex items-center">
                        <a class=" text-white py-2 px-5 rounded bg-gray-400 hover:bg-gray-600" href="{{route('external.profile.card.index')}}">Volver al listado</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function card_type(val){
            amex = document.getElementById('amex');
            visa = document.getElementById('visa');
            mastercard = document.getElementById('mastercard');

            if(val[0] == '3')
            {
                amex.style.display ='';
                visa.style.display ='none';
                mastercard.style.display ='none';
            }
            else if(val[0] == '4')
            {
                amex.style.display ='none';
                visa.style.display ='';
                mastercard.style.display ='none';
            }
            else if(val[0] == '5')
            {
                amex.style.display ='none';
                visa.style.display ='none';
                mastercard.style.display ='';
            }
            else
            {
                amex.style.display ='none';
                visa.style.display ='none';
                mastercard.style.display ='none';
            }
        }
    </script>
@endpush

@endsection

@extends('layouts.external.layout')

@section('header', 'Añadir tarjeta')

@section('content')

<div class="container mx-auto mt-8">
    <div>
        <div class="flex justify-between">
            <h3 class="text-blue-400 text-3xl font-semibold">Añadir tarjeta</h3>
            <a class="text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-700" href="{{route('external.profile.card.index')}}">Volver al listado</a>
        </div>
        <div class="p-5 mt-4 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
            <form method="POST" action="{{route('external.profile.card.store')}}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="mt-5">
                        <x-label>Número de tarjeta</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="number" min="0" required step="1" type="number" value="{{old('number')}}" />
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

                    <div class="md:col-span-2">
                        <x-label>Titular de la tarjeta</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="holder_name" required type="text" value="{{old('holder_name')}}" />
                        @error('holder_name') <span class="text-red-500 font-semibold">{{$errors->first('holder_name')}}</span> @enderror
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class=" my-2 w-24 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Añadir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

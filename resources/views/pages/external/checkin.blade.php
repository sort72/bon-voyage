@extends('layouts.external.layout')

@section('header', 'Realizar check-in')

@section('content')

<div class="container mx-auto mt-8">
    <div>
        <div class="flex justify-center">
            <h3 class="text-sky-400 text-3xl font-semibold">Realizar checkin</h3>
        </div>
        <div class="p-5 mt-4 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
            <form method="POST" action="{{route('external.validate-checkin')}}">
                @csrf
                <div class="grid grid-cols-1 gap-4">

                    <div class="mt-5">
                        <x-label>Documento de identificación</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="dni" required type="text" value="{{old('dni', $dni)}}" />
                        @error('dni') <span class="text-red-500 font-semibold">{{$errors->first('dni', $dni)}}</span> @enderror
                    </div>

                    <div class="mt-5">
                        <x-label>Código de reserva</x-label>
                        <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="reservation_code" required type="text" value="{{old('reservation_code', $reservation_code)}}" />
                        @error('reservation_code') <span class="text-red-500 font-semibold">{{$errors->first('reservation_code', $reservation_code)}}</span> @enderror
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class=" my-2 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Continuar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

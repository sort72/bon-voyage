@extends('layouts.dashboard.layout')

@section('header', 'Crear destino')

@section('content')

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-blue-500 hover:bg-blue-700" href="{{route('dashboard.flight.index')}}">Volver al listado</a>
            </div>
            <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
                <form method="POST" action="{{route('dashboard.destination.store')}}">
                    @csrf
                    <div class="flex justify-center flex-col">
                        <x-label>Nombre</x-label>
                        <input placeholder="Nombre" value="{{old('name')}}" name="name" class="py-2 px-4 rounded shadow border border-gray-300 outline-1 outline-gray-900 bg-gray-50" required />
                        @error('name')
                            <span class="text-red-500 font-semibold">{{$errors->first('name')}}</span>
                        @enderror
                        <button type="submit" class="my-2 w-24 text-white py-2 px-5 rounded bg-gray-900 hover:bg-gray-800">Crear</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.dashboard.layout')

@section('header', 'Crear destino')

@section('content')

<!-- //TODO: Añadir la zona horaria -->
<div class="pb-2 mb-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-700" href="{{route('dashboard.destination.index')}}">Volver al listado</a>
            </div>
            <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
                <form method="POST" action="{{route('dashboard.destination.store')}}">
                    @csrf
                    <div class="flex justify-center flex-col">

                        @include('components.location-select')

                        <div class="mt-5">
                            <x-label>Zona horaria</x-label>
                            <livewire:location.timezone
                                name="timezone"
                                :value="$errors->has('timezone') ? '' : old('timezone')"
                                placeholder="Selecciona una zona horaria"
                                :searchable="true"
                            />
                            @error('timezone') <span class="text-red-500 font-semibold">{{$errors->first('timezone')}}</span> @enderror
                        </div>

                        <div class="mt-5 text-center">
                            <button type="submit" class=" my-2 w-24 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

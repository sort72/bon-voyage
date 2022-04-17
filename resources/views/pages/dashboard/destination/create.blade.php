@extends('layouts.dashboard.layout')

@section('header', 'Crear destino')

@section('content')

<!-- //TODO: Añadir la zona horaria -->
<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-blue-500 hover:bg-blue-700" href="{{route('dashboard.destination.index')}}">Volver al listado</a>
            </div>
            <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
                <form method="POST" action="{{route('dashboard.destination.store')}}">
                    @csrf
                    <div class="flex justify-center flex-col">
                        <div class="mt-5">
                            <x-label>País de destino</x-label>
                            <livewire:location.country
                                name="country_id"
                                :value="old('country_id')"
                                :searchable="true"
                                placeholder="Selecciona un país de destino"
                            />
                            @error('country_id') <span class="text-red-500 font-semibold">{{$errors->first('country_id')}}</span> @enderror
                        </div>

                        <div class="mt-5">
                            <x-label>Estado/provincia</x-label>
                            <livewire:location.division
                                name="division_id"
                                :value="old('division_id')"
                                placeholder="Selecciona un estado/provincia"
                                :depends-on="['country_id']"
                            />
                            @error('division_id') <span class="text-red-500 font-semibold">{{$errors->first('division_id')}}</span> @enderror
                        </div>

                        <div class="mt-5">
                            <x-label>Ciudad</x-label>
                            <livewire:location.city
                                name="city_id"
                                :value="old('city_id')"
                                placeholder="Selecciona una ciudad"
                                :depends-on="['country_id', 'division_id']"
                            />
                            @error('city_id') <span class="text-red-500 font-semibold">{{$errors->first('city_id')}}</span> @enderror
                        </div>


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


                        <button type="submit" class="my-2 w-24 text-white py-2 px-5 rounded bg-gray-900 hover:bg-gray-800">Crear</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

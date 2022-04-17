@extends('layouts.dashboard.layout')

@section('header', 'Modificar destino ' . $destination->name)

@section('content')

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-blue-500 hover:bg-blue-700" href="{{route('dashboard.flight.index')}}">Volver al listado</a>
            </div>
            <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
                <form method="POST" action="{{route('dashboard.destination.update', $destination->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="flex justify-center flex-col">

                        @include('components.location-select', ['country_id' => $destination->city->country->id, 'division_id' => $destination->city->destination ? $destination->city->destination->id : '', 'city_id' => $destination->city_id ])

                        <div class="mt-5">
                            <x-label>Zona horaria</x-label>
                            <livewire:location.timezone
                                name="timezone"
                                :value="$errors->has('timezone') ? '' : old('timezone', $destination->timezone)"
                                placeholder="Selecciona una zona horaria"
                                :searchable="true"
                            />
                            @error('timezone') <span class="text-red-500 font-semibold">{{$errors->first('timezone')}}</span> @enderror
                        </div>

                        <button type="submit" class="my-2 w-24 text-white py-2 px-5 rounded bg-gray-900 hover:bg-gray-800">Modificar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

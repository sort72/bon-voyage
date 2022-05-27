@extends('layouts.dashboard.layout')

@section('header', 'Modificar vuelo ' . $flight->name)

@section('content')

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
          <form method="POST" action="{{route('dashboard.flight.update', $flight->id)}}">
            @csrf
            @method("PATCH")
            <div class="grid grid-cols-2 gap-6">

              <!-- Fecha de vuelo -->
              <div class="col-span-2">
                <label class="font-semibold" for="departure_time">Fecha de vuelo (Hora Colombia) [Fecha actual: {{ now()->timezone('America/Bogota') }}]</label>
                <input {{ $cant_edit ? 'readonly' : '' }} class="mt-1 w-full border border-black-800 rounded-md p-1 {{ $cant_edit ? '' : 'flatpickr-datetime' }} " id="departure_time" name="departure_time" type="text" value="{{old('departure_time', $flight->departure_time)}}" />
                <p>La fecha y hora debe ser en hora de Colombia aunque el origen o el destino sean de otro país. El vuelo se mostrará en la zona horaria del origen y del destino automáticamente.</p>
                @error('departure_time')
                  <span class="text-red-500 font-semibold">{{$errors->first('departure_time')}}</span>
                @enderror
              </div>

              <!-- Tiempo o duración -->
              <div class="col-span-2">
                <label class="font-medium text-sky-800" for="duration">Duración del vuelo</label>
                <input {{ $cant_edit ? 'readonly' : '' }} class="mt-1 w-full border border-gray-300 rounded-md p-1" id="duration" min="0" name="duration" placeholder="Duración en minutos" required step="1" type="number" value="{{old('duration', $flight->duration)}}" />
                @error('duration')
                <span class="text-red-500 font-semibold">{{$errors->first('duration')}}</span>
                @enderror
              </div>

              <!-- Origen -->
              <div>
                <label class="font-medium text-sky-800" for="origin_id">Origen</label>
                <select class=" mt-1 w-full border border-gray-300 rounded-md p-1" name="origin_id">
                    @if ($cant_edit)
                        <option value="{{$flight->origin_id}}">{{$flight->origin->city->name}}</option>
                    @else
                        <option val="">Seleccione...</option>
                        @foreach ($destinations as $destination)
                            <option @if(old('origin_id', $flight->origin_id) == $destination->id) selected @endif value="{{$destination->id}}">{{$destination->city->name}}</option>
                        @endforeach
                    @endif
                </select>
                @error('origin_id')
                <span class="text-red-500 font-semibold">{{$errors->first('origin_id')}}</span>
                @enderror
              </div>

              <!-- Destino -->
              <div>
                <label class="font-medium text-sky-800" for="destination_id">Destino</label>
                <select class=" mt-1 w-full border border-gray-300 rounded-md p-1" name="destination_id">
                    @if ($cant_edit)
                        <option value="{{$flight->destination_id}}">{{$flight->destination->city->name}}</option>
                    @else
                        <option val="">Seleccione...</option>
                        @foreach ($destinations as $destination)
                            <option @if(old('origin_id', $flight->origin_id) == $destination->id) selected @endif value="{{$destination->id}}">{{$destination->city->name}}</option>
                        @endforeach
                    @endif
                </select>
                @error('destination_id')
                <span class="text-red-500 font-semibold">{{$errors->first('destination_id')}}</span>
                @enderror
              </div>

              <!-- Precio -->
              <div>
                <label class="font-medium text-sky-800" for="economy_class_price">Precio clase económica</label>
                <input {{ $cant_edit ? 'readonly' : '' }} class="mt-1 w-full border border-gray-300 rounded-md p-1" name="economy_class_price" min="0" placeholder="Precio" required step="1" type="number" value="{{old('economy_class_price', $flight->economy_class_price)}}" />
                @error('economy_class_price')
                  <span class="text-red-500 font-semibold">{{$errors->first('economy_class_price')}}</span>
                @enderror
              </div>
              <div>
                <label class="font-medium text-sky-800" for="first_class_price">Precio primera clase</label>
                <input {{ $cant_edit ? 'readonly' : '' }} class="mt-1 w-full border border-gray-300 rounded-md p-1" name="first_class_price" min="0" placeholder="Precio" required step="1" type="number" value="{{old('first_class_price', $flight->first_class_price)}}" />
                @error('first_class_price')
                  <span class="text-red-500 font-semibold">{{$errors->first('first_class_price')}}</span>
                @enderror
              </div>

              <div class="col-span-2">
                <label class="font-medium text-sky-800" for="discount">Descuento (%)</label>
                <input class="mt-1 w-full border border-gray-300 rounded-md p-1" name="discount" min="0" max="100" placeholder="Descuento" step="1" type="number" value="{{old('discount', $flight->discount)}}" />
                @error('discount')
                  <span class="text-red-500 font-semibold">{{$errors->first('discount')}}</span>
                @enderror
              </div>

              <!-- Botón envio de formulario -->
              <div class="col-span-2 justify-self-center">
                <div class="flex justify-between gap-2">
                    <button type="submit" class="my-2 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Modificar</button>
                    <a href="{{ route('dashboard.flight.index') }}" class="my-2 text-white py-2 px-5 rounded bg-gray-500 hover:bg-gray-400">Cancelar</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection

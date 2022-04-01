@extends('layouts.dashboard.layout')

@section('header', 'Crear vuelo')

@section('content')

<div class="py-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden">
      <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
        <form method="POST" action="{{route('dashboard.flight.store')}}">
          @csrf
          <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2 justify-self-center">
              <h1 class="text-2xl text-cyan-600 underline font-semibold">Crear vuelo</h1>
            </div>

            <!-- Fecha de vuelo -->
            <div class="col-span-2">
              <label class="font-semibold" for="flight_date">Fecha de vuelo</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="flight_date" name="flight_date" type="date" value="{{old('flight_date')}}" />
              @error('flight_date')
              <span class="text-red-500 font-semibold">{{$errors->first('flight_date')}}</span>
              @enderror
            </div>

            <!-- Hora salida -->
            <div>
              <label class="font-semibold" for="departure_time">Hora salida</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="departure_time" name="departure_time" placeholder="Hora de salida" required type="time" value="{{old('departure_time')}}" />
              @error('departure_time')
              <span class="text-red-500 font-semibold">{{$errors->first('departure_time')}}</span>
              @enderror
            </div>

            <!-- Tiempo o duración -->
            <div>
              <label class="font-semibold" for="flight_duration">Duración del vuelo</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="flight_duration" min="0" name="flight_duration" placeholder="Duración en minutos" required step="1" type="number" value="{{old('flight_duration')}}" />
              @error('flight_duration')
              <span class="text-red-500 font-semibold">{{$errors->first('flight_duration')}}</span>
              @enderror
            </div>

            <!-- Origen -->
            <!-- //TODO: Reviar como mandar el id de origen o renombrar el campo-->
            <div>
              <label class="font-semibold" for="origin_id">Origen</label>
              <select class=" mt-1 w-full border border-black-800 rounded-md p-1" name="origin_id">
                <option val="">Seleccione...</option>
                @foreach ($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                @endforeach
              </select>
              @error('origin_id')
              <span class="text-red-500 font-semibold">{{$errors->first('origin_id')}}</span>
              @enderror
            </div>

            <!-- Destino -->
            <!-- //TODO: Reviar como mandar el id de destino o renombrar el campo-->
            <div>
              <label class="font-semibold" for="destination_id">Destino</label>
              <select class=" mt-1 w-full border border-black-800 rounded-md p-1" name="destination_id">
                <option val="">Seleccione...</option>
                @foreach ($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                @endforeach
              </select>
              @error('destination_id')
              <span class="text-red-500 font-semibold">{{$errors->first('destination_id')}}</span>
              @enderror
            </div>

            <!-- Precio -->
            <div>
              <label class="font-semibold" for="flight_price">Precio</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="flight_price" name="flight_price" min="0" placeholder="Precio" required step="1" type="number" value="{{old('flight_price')}}" />
              @error('flight_price')
              <span class="text-red-500 font-semibold">{{$errors->first('flight_price')}}</span>
              @enderror
            </div>

            <!-- Botón envio de formulario -->
            <div class="col-span-2 justify-self-center">
              <button type="submit" class="my-2 w-24 text-white py-2 px-5 rounded bg-cyan-600 hover:bg-gray-800">Crear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@extends('layouts.dashboard.layout')

@section('header', 'Crear vuelo')

@section('content')

<div class="py-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden">
      <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
        <form method="GET" action="#">
          @csrf
          <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2 justify-self-center">
              <h1 class="text-2xl text-cyan-600 underline font-semibold">Crear vuelo</h1>
            </div>

            <!-- Fecha de vuelo -->
            <div class="col-span-2">
              <label class="font-semibold" for="flight_date">Fecha de vuelo</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="flight_date" min={{$min_flight_date}} name="flight_date" type="date" value="{{old('flight_date')}}" />
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
              <label class="font-semibold" for="flight_duration">Tiempo / Duración</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="flight_duration" min="0" name="flight_duration" placeholder="Duración" required step="1" type="number" value="{{old('flight_duration')}}" />
              @error('flight_duration')
              <span class="text-red-500 font-semibold">{{$errors->first('flight_duration')}}</span>
              @enderror
            </div>

            <!-- Origen -->
            <!-- //TODO: Reviar como mandar el id de origen o renombrar el campo-->
            <div>
              <label class="font-semibold" for="origin_id">Origen</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="origin_id" name="origin_id" placeholder="Origen" required type="text" value="{{old('origin_id')}}" />
              @error('origin_id')
              <span class="text-red-500 font-semibold">{{$errors->first('origin_id')}}</span>
              @enderror
            </div>

            <!-- Destino -->
            <!-- //TODO: Reviar como mandar el id de destino o renombrar el campo-->
            <div>
              <label class="font-semibold" for="destination_id">Destino</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="destination_id" name="destination_id" placeholder="Destino" required type="text" value="{{old('destination_id')}}" />
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

            <!-- Es internacional -->
            <div>
              <div class="form-check form-switch mt-8">
                <label class="form-check-label inline-block font-semibold text-sm" for="is_international">¿Es un vuelo internaiconal?</label>
                <input class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain focus:outline-none cursor-pointer shadow-sm" type="checkbox" role="switch" id="is_international">
              </div>
            </div>

            <!-- Hora llegada-->
            <div>
              <label class="font-semibold" for="arrive_time">Hora llegada</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="arrive_time" name="arrive_time" placeholder="Hora de llegada" required type="time" value="{{old('arrive_time')}}" />
              @error('arrive_time')
              <span class="text-red-500 font-semibold">{{$errors->first('arrive_time')}}</span>
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
@extends('layouts.dashboard.layout')

@section('header', 'Crear vuelo')

@section('content')

<div class="py-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden">
      <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
        <form method="POST" action="{{route('dashboard.create-admin')}}">
          @csrf
          <div class="grid grid-cols-2 gap-6">
            <!-- Nombres -->
            <div>
              <label class="font-semibold" for="name">Nombres</label>
              <input autofocus class="block mt-1 w-full border border-black-800 rounded-md p-1" id="name" name="name" placeholder="Ingrese su nombre" type="text" value="{{old('name')}}" />
            </div>

            <!-- Apellidos -->
            <div>
              <label class="font-semibold" for="surname">Apellidos</label>
              <input class="block mt-1 w-full border border-black-800 rounded-md p-1" id="surname" name="surname" placeholder="Ingrese sus apellidos" type="text" value="{{old('surname')}}" />
              @error('name')
              <span class="text-red-500 font-semibold">{{$errors->first('name')}}</span>
              @enderror
            </div>

            <!-- Correo electronico -->
            <div>
              <label class="font-semibold" for="email">Correo electronico</label>
              <input class="block mt-1 w-full border border-black-800 rounded-md p-1" id="email" name="email" placeholder="Ingrese su correo electronico" required type="email" value="{{old('email')}}" />
              @error('email')
              <span class="text-red-500 font-semibold">{{$errors->first('email')}}</span>
              @enderror
            </div>

            <!-- Documento -->
            <div>
              <label class="font-semibold" for="dni">Documento</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="dni" name="dni" placeholder="Ingrese su documento" required type="text" value="{{old('dni')}}" />
              @error('dni')
              <span class="text-red-500 font-semibold">{{$errors->first('dni')}}</span>
              @enderror
            </div>

            <!-- Fecha nacimiento -->
            <div>
              <label class="font-semibold" for="birth_date">Fecha nacimiento</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="birth_date" name="birth_date" type="date" value="{{old('birth_date')}}" />
              @error('birth_date')
              <span class="text-red-500 font-semibold">{{$errors->first('birth_date')}}</span>
              @enderror
            </div>

            <!-- Lugar nacimiento -->
            <!-- Revisar como hacer para que el campo se una lista -->
            <div>
              <label class="font-semibold" for="birth_place">Lugar nacimiento</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="birth_place" name="birth_place" placeholder="Ingrese su lugar de nacimiento" type="text" value="{{old('birth_place')}}" />
              @error('birth_place')
              <span class="text-red-500 font-semibold">{{$errors->first('birth_place')}}</span>
              @enderror
            </div>

            <!-- Género -->
            <!-- TODO: Revisar como implementar la revision de errores -->
            <div>
              <label class="font-semibold" for="gender">Género</label>

              <select class="mt-1 w-full border border-black-800 rounded-md p-1" id="gender" name="gender">
                <option value="">Seleccione una opcion</option>
                <option value="female">Femenino</option>
                <option value="male">Masculino</option>
                <option value="others">Otros</option>
              </select>
            </div>

            <!-- Dirección de facturación -->
            <div>
              <label class="font-semibold" for="address">Dirección de facturación</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="address" name="address" placeholder="Ingrese su dirección" type="text" value="{{old('address')}}" />
              @error('address')
              <span class="text-red-500 font-semibold">{{$errors->first('address')}}</span>
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
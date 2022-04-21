@extends('layouts.dashboard.layout')

@section('header', 'Crear administrador')

@section('content')

<div class="py-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden">
      <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
        <form method="POST" action="{{route('dashboard.store-admin')}}">
          @csrf
          <input hidden name="creating_mode" value="admin" />
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2 justify-self-center">
              <h1 class="text-2xl text-cyan-600 underline font-semibold">Crear Administrador</h1>
            </div>
            <!-- Nombres -->
            <div>
              <label class="font-semibold" for="name">Nombres</label>
              <input autofocus class="block mt-1 w-full border border-black-800 rounded-md p-1" id="name" name="name" type="text" value="{{old('name')}}" />
              @error('name')
                <span class="text-red-500 font-semibold">{{$errors->first('name')}}</span>
              @enderror
            </div>

            <!-- Apellidos -->
            <div>
              <label class="font-semibold" for="surname">Apellidos</label>
              <input class="block mt-1 w-full border border-black-800 rounded-md p-1" id="surname" name="surname" type="text" value="{{old('surname')}}" />
              @error('surname')
                <span class="text-red-500 font-semibold">{{$errors->first('surname')}}</span>
              @enderror
            </div>

            <!-- Correo electronico -->
            <div>
              <label class="font-semibold" for="email">Correo electronico</label>
              <input class="block mt-1 w-full border border-black-800 rounded-md p-1" id="email" name="email" required type="email" value="{{old('email')}}" />
              @error('email')
                <span class="text-red-500 font-semibold">{{$errors->first('email')}}</span>
              @enderror
            </div>

            <!-- Documento -->
            <div>
              <label class="font-semibold" for="dni">Documento</label>
              <input class="mt-1 w-full border border-black-800 rounded-md p-1" id="dni" name="dni" required type="text" value="{{old('dni')}}" />
              @error('dni')
                <span class="text-red-500 font-semibold">{{$errors->first('dni')}}</span>
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

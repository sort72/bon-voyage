@extends('layouts.external.layout')

@section('header', 'External')

@section('content')

<h1 class="mt-0 mb-2 text-center sm:text-xl md:text-5xl mb-4 font-bold leading-tight text-blue-700">Editar perfil de Nombre Apellido</h1>
<div class="flex">

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <div class="mx-auto max-w-lg justify-self-center border-b border-gray-200 bg-white p-5 sm:rounded-lg">
    <div>
      <form class="grid grid-cols-2 gap-4 gap-y-5 sm:text-xs md:text-base" method="patch" action="{{route('external.update-profile')}}">
        <div>
          <x-label for="email" value="Email *" />
          <x-input id="email" type="email" name="email" class="block mt-1 w-full h-10 bg-gray-50" readonly :value="old('email', $user->email)" required/>
        </div>
        <div>
          <x-label for="dni" value="Documento *" />
          <x-input id="dni" type="text" name="dni" class="block mt-1 w-full h-10 bg-gray-50" readonly :value="old('dni', $user->dni)" required/>
        </div>
        <div>
          <x-label for="name" value="Nombres *" />
          <x-input id="name" type="text" name="name" class="block mt-1 w-full h-10" :value="old('name', $user->name)" required autofocus />
        </div>
        <div>
          <x-label for="surname" value="Apellidos *" />
          <x-input id="surname" type="text" name="surname" class="block mt-1 w-full h-10" :value="old('surname', $user->surname)" required />
        </div>
        <div class="col-span-2">
          <x-label for="birth_date" value="Fecha de nacimiento *" />

          <x-input id="birth_date" type="text" name="birth_date" class="block mt-1 w-full flatpickr-birth bg-gray-50" readonly :value="old('birth_date', $user->birth_date)" required />
        </div>
        <div class="col-span-2">
          @include('components.location-select')
        </div>
        <div>
          <x-label for="address" value="Dirección de facturación *" />
          <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $user->address)" required />
        </div>
        <div>
          <x-label for="gender" value="Género *" />

          <select name="gender" id="gender" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
            <option value="">Seleccione</option>
            <option @if(old('gender', $user->gender) == 'male') selected @endif value="male">Masculino</option>
            <option @if(old('gender', $user->gender) == 'female') selected @endif value="female">Femenino</option>
            <option @if(old('gender', $user->gender) == 'others') selected @endif value="others">Otros</option>
          </select>
        </div>
        <div class="col-span-2">
          <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-400"></div>
            <span class="flex-shrink mx-4 text-gray-400">Cambiar contraseña</span>
            <div class="flex-grow border-t border-gray-400"></div>
          </div>
        </div>
        <div class="col-span-2">
          <div>
            <x-label for="password" value="Contraseña" />
            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password" />
          </div>
        </div>
        <div>
          <x-label for="new_password" value="Nueva contraseña" />
          <x-input id="new_password" class="block mt-1 w-full"
                          type="password"
                          name="new_password" />
        </div>
        <div>
          <x-label for="password_confirmation" value="Confirmar contraseña" />

          <x-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" />
        </div>
        <div class="justify-self-center col-span-2">
          <p class="italic my-2 text-sm px-2">
                  Todos los campos marcados con * son obligatorios.
          </p>
        </div>
        <div class="justify-self-center col-span-2">
          <x-button type="submit">
            {{ __('Guardar') }}
          </x-button>
        </div>
      </form>
    </div>
  </div>  
</div>
@endsection
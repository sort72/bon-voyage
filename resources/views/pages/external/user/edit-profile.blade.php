@extends('layouts.external.layout')

@section('header', 'External')

@section('content')

<h1 class="mt-0 mb-2 text-center text-5xl font-bold leading-tight text-purple-800">Editar perfil de Nombre Apellido</h1>
<div class="flex">
  <div class="mx-auto max-w-lg justify-self-center border-b border-gray-200 bg-white p-5 sm:rounded-lg">
    <div class="grid grid-cols-2 gap-4 gap-y-5">
      <div>
        <label for="dni">Documento *</label>
        <input class="mt-1 border-2 sm:rounded-md w-full" />
      </div>
      <div>
        <label for="email">Correo electrónico *</label>
        <input class="mt-1 border-2 sm:rounded-md w-full" />
      </div>
      <div>
        <label for="name">Nombres *</label>
        <input class="mt-1 border-2 sm:rounded-md w-full" />
      </div>
      <div>
        <label for="surname">Apellidos *</label>
        <input class="mt-1 border-2 sm:rounded-md w-full" />
      </div>
      <div class="col-span-2">
        <label class="block" for="birth_date">Fecha de nacimiento *</label>
        <input class="mt-1 border-2 sm:rounded-md w-full" type="date"/>
      </div>
      <div class="col-span-2">
        <label class="block" for="surname">Location-select uwu</label>
      </div>
      <div>
        <label for="address">Dirección de facturación *</label>
        <input class="mt-1 border-2 sm:rounded-md w-full" />
      </div>
      <div>
        <label for="gender">Género *</label>
        <select name="gender" id="gender" class="block mt-1 w-full h-7 rounded-md border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
          <option value="">Seleccione el género</option>
          <option @if(old('gender') == 'male') selected @endif value="male">Masculino</option>
          <option @if(old('gender') == 'female') selected @endif value="female">Femenino</option>
          <option @if(old('gender') == 'others') selected @endif value="others">Otros</option>
        </select>
      </div>
      <div>
        <label for="password">Contraseña *</label>
        <input class="block mt-1 w-full sm:rounded-md" type="password" name="password" required autocomplete="new-password" />
      </div>
      <div>
        <label for="password_confirmation">Contraseña *</label>
        <input class="block mt-1 w-full sm:rounded-md" type="password" name="password" required autocomplete="new-password" />
      </div>
    </div>
  </div>  
</div>
@endsection
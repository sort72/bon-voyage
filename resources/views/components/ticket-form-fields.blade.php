@props(['adultNumber' => 1])
<!-- TODO: Revisar los campos requeridos y como poner los name correspondientes -->
<div class="overflow-hidden py-4">
    <!-- Campos -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-12 sm:gap-y-6 p-8 sm:px-8 sm:py-6 rounded-xl border-2 font-semibold bg-white border-gray-400 overflow-hidden"> -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-8 px-12 py-6 rounded-xl border-2 font-semibold bg-white border-gray-400 overflow-hidden">

      <div class="md:col-span-2 -mb-4">
        <h1 class="mb-3 text-xl text-sky-700">Adulto {{ $adultNumber }}</h1>
      </div>
      <!-- Documento -->
      <div>
        <label for="dni">Documento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="dni[]"
          required
          type="text"
          value="{{ old('dni') }}" />
        @error('dni')
        <span class="text-red-500 font-semibold">{{$errors->first('dni')}}</span>
        @enderror
      </div>

      <!-- Correo -->
      <div>
        <label for="email">Correo *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="email"
          required
          type="email 
          value="{{ old('email') }}" />
        @error('email')
        <span class="text-red-500 font-semibold">{{$errors->first('email')}}</span>
        @enderror
      </div>

      <!-- Nombre -->
      <div>
        <label for="name">Nombre *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="name"
          required
          type="text"
          value="{{ old('name') }}" />
        @error('name')
        <span class="text-red-500 font-semibold">{{$errors->first('name')}}</span>
        @enderror
      </div>

      <!-- Apellidos -->
      <div>
        <label for="surname">Apellidos *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="surname"
          required
          type="text"
          value="{{old('surname')}}" />
        @error('surname')
        <span class="text-red-500 font-semibold">{{$errors->first('surname')}}</span>
        @enderror
      </div>

      <!-- Fecha Nacimiento -->
      <div>
        <label for="birth_date" class="block text-truncate">Fecha de nacimiento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1 flatpickr-birth"
          name="birth_date"
          required
          type="text"
          value="{{ old('birth_date') }}" />
        @error('birth_date')
        <span class="text-red-500 font-semibold">{{$errors->first('birth_date')}}</span>
        @enderror
      </div>

      <!-- Género -->
      <div>
        <label for="gender">Género</label>
        <select
          class="border-black-800 w-full rounded-xl border border-gray-400 p-1 overflow-hidden"
          name="gender">
          <option value="">Seleccione una opcion</option>
          <option @if(old('gender')=='male' ) selected @endif value="male">Masculino</option>
          <option @if(old('gender')=='female' ) selected @endif value="female">Femenino</option>
          <option @if(old('gender')=='others' ) selected @endif value="others">Otros</option>
        </select>
      </div>

      <!-- Télefono -->
      <div>
        <label for="phone">Teléfono</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="phone"
          type="number"
          value="{{ old('phone') }}" />
        @error('phone')
        <span class="text-red-500 font-semibold">{{$errors->first('phone')}}</span>
        @enderror
      </div>

      <!-- Nombre de contacto -->
      <div>
        <label for="contact_name" class="block text-truncate">Nombre de contacto</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="contact_name"
          type="text"
          value="{{ old('contact_name') }}" />
        @error('contact_name')
        <span class="text-red-500 font-semibold">{{$errors->first('contact_name')}}</span>
        @enderror
      </div>

      <!-- Telefono de contacto -->
      <div class="md:col-span-2 md:justify-self-center">
        <label class="block text-truncate" for="contact_phone"> Teléfono de contacto </label>

        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="contact_phone"
          type="number"
          value="{{ old('contact_phone') }}" />
        @error('contact_phone')
        <span class="text-red-500 font-semibold">{{$errors->first('contact_phone')}}</span>
        @enderror
      </div>
    </div>
</div>

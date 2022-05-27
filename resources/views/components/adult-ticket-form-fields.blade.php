@props(['adultNumber' => 0])
<div class="overflow-hidden py-4">
    <!-- Campos -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-12 sm:gap-y-6 p-8 sm:px-8 sm:py-6 rounded-xl border-2 font-semibold bg-white border-gray-400 overflow-hidden"> -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-8 px-12 py-6 rounded-xl border-2 font-semibold bg-white border-gray-400 overflow-hidden">

      <div class="md:col-span-2 -mb-4">
        <h1 class="mb-3 text-xl text-sky-700">Adulto {{ $adultNumber + 1}}</h1>
      </div>
      <!-- Documento -->
      <div>
        <label for="adult_dni">Documento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_dni[]"
          required
          type="text"
          value="{{ old('adult_dni.' . $adultNumber) }}"
        />
        @error('adult_dni.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_dni.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Correo -->
      <div>
        <label for="adult_email">Correo *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_email[]"
          required
          type="email"
          value="{{ old('adult_email.' . $adultNumber) }}"
        />
        @error('adult_email.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_email.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Nombre -->
      <div>
        <label for="adult_name">Nombre *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_name[]"
          required
          type="text"
          value="{{ old('adult_name.' . $adultNumber) }}"
        />
        @error('adult_name.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_name.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Apellidos -->
      <div>
        <label for="adult_surname">Apellidos *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_surname[]"
          required
          type="text"
          value="{{ old('adult_surname.' . $adultNumber) }}"
        />
        @error('adult_surname.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_surname.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Fecha Nacimiento -->
      <div>
        <label for="adult_birth_date" class="block text-truncate">Fecha de nacimiento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1 flatpickr-birth"
          name="adult_birth_date[]"
          required
          type="text"
          value="{{ old('adult_birth_date.' . $adultNumber) }}"
        />
        @error('adult_birth_date.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_birth_date.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Género -->
      <div>
        <label for="adult_gender">Género *</label>
        <select
          class="border-black-800 w-full rounded-xl border border-gray-400 p-1 overflow-hidden"
          name="adult_gender[]">
          <option value="">Seleccione una opcion</option>
          <option @if(old('adult_gender.' . $adultNumber)=='male' ) selected @endif value="male">Masculino</option>
          <option @if(old('adult_gender.' . $adultNumber)=='female' ) selected @endif value="female">Femenino</option>
          <option @if(old('adult_gender.' . $adultNumber)=='others' ) selected @endif value="others">Otros</option>
        </select>
        @error('adult_gender.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_gender.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Télefono -->
      <div>
        <label for="adult_phone">Teléfono *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_phone[]"
          type="number"
          value="{{ old('adult_phone.' . $adultNumber) }}"
        />
        @error('adult_phone.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_phone.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Nombre de contacto -->
      <div>
        <label for="adult_emergency_name" class="block text-truncate">Nombre de contacto *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_emergency_name[]"
          type="text"
          value="{{ old('adult_emergency_name.' . $adultNumber) }}"
        />
        @error('adult_emergency_name.' . $adultNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('adult_emergency_name.' . $adultNumber)}}</span>
        @enderror
      </div>

      <!-- Telefono de contacto -->
      <div class="md:col-span-2 md:justify-self-center ">
        <label class="block text-truncate" for="adult_emergency_contact"> Teléfono de contacto *</label>

        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="adult_emergency_contact[]"
          type="number"
          value="{{ old('adult_emergency_contact.' . $adultNumber) }}"
        />
        @error('adult_emergency_contact.' . $adultNumber)
          <span class="text-red-500 font-semibold text-truncate">{{$errors->first('adult_emergency_contact.' . $adultNumber)}}</span>
        @enderror
      </div>
    </div>
</div>

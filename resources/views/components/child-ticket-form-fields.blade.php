@props(['childNumber' => 1])
<div class="overflow-hidden py-4">
    <!-- Campos -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-12 sm:gap-y-6 p-8 sm:px-8 sm:py-6 rounded-xl border-2 font-semibold bg-white border-gray-400 overflow-hidden"> -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-8 px-12 py-6 rounded-xl border-2 font-semibold bg-white border-gray-400 overflow-hidden">

      <div class="md:col-span-2 -mb-4">
        <h1 class="mb-3 text-xl text-sky-700">Niño {{ $childNumber + 1}}</h1>
      </div>
      <!-- Documento -->
      <div>
        <label for="child_dni">Documento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="child_dni[]"
          required
          type="text"
          value="{{ old('child_dni.' . $childNumber) }}"
        />
        @error('child_dni.' . $childNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('child_dni.' . $childNumber)}}</span>
        @enderror
      </div>

      <!-- Nombre -->
      <div>
        <label for="child_name">Nombre *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="child_name[]"
          required
          type="text"
          value="{{ old('child_name.' . $childNumber) }}"
        />
        @error('child_name.' . $childNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('child_name.' . $childNumber)}}</span>
        @enderror
      </div>

      <!-- Apellidos -->
      <div>
        <label for="child_surname">Apellidos *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="child_surname[]"
          required
          type="text"
          value="{{ old('child_surname.' . $childNumber) }}"
        />
        @error('child_surname.' . $childNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('child_surname.' . $childNumber)}}</span>
        @enderror
      </div>

      <!-- Fecha Nacimiento -->
      <div>
        <label for="child_birth_date" class="block text-truncate">Fecha de nacimiento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1 flatpickr-birth-children"
          name="child_birth_date[]"
          required
          type="text"
          value="{{ old('child_birth_date.' . $childNumber) }}"
        />
        @error('child_birth_date.' . $childNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('child_birth_date.' . $childNumber)}}</span>
        @enderror
      </div>

      <!-- Género -->
      <div>
        <label for="child_gender">Género *</label>
        <select
          class="border-black-800 w-full rounded-xl border border-gray-400 p-1 overflow-hidden"
          name="child_gender[]">
          {{-- <option value="">Seleccione una opcion</option> --}}
          <option @if(old('child_gender.' . $childNumber)=='male' ) selected @endif value="male">Masculino</option>
          <option @if(old('child_gender.' . $childNumber)=='female' ) selected @endif value="female">Femenino</option>
          <option @if(old('child_gender.' . $childNumber)=='others' ) selected @endif value="others">Otros</option>
        </select>
        @error('child_gender.' . $childNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('child_gender.' . $childNumber)}}</span>
        @enderror
      </div>

      <!-- Nombre de contacto -->
      <div>
        <label for="child_emergency_name" class="block text-truncate">Nombre de contacto *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="child_emergency_name[]"
          type="text"
          value="{{ old('child_emergency_name.' . $childNumber) }}"
        />
        @error('child_emergency_name.' . $childNumber)
          <span class="text-red-500 font-semibold">{{$errors->first('child_emergency_name.' . $childNumber)}}</span>
        @enderror
      </div>

      <!-- Telefono de contacto -->
      <div class="md:col-span-2 md:justify-self-center ">
        <label class="block text-truncate" for="child_emergency_contact"> Teléfono de contacto *</label>

        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          name="child_emergency_contact[]"
          type="number"
          value="{{ old('child_emergency_contact.' . $childNumber) }}"
        />
        @error('child_emergency_contact.' . $childNumber)
          <span class="text-red-500 font-semibold text-truncate">{{$errors->first('child_emergency_contact.' . $childNumber)}}</span>
        @enderror
      </div>
    </div>
</div>

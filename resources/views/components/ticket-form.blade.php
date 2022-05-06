<div class="overflow-hidden bg-white">
  <form action="" class="shadow-md overflow-hidden">
    <!-- Campos -->
    <div
      class="sm:grid md:grid-cols-2 gap-x-8 gap-y-4 rounded-xl border-2 font-semibold border-gray-400 p-6 overflow-hidden">
      <div class="col-span-2 -mb-4">
        <h1 class="mb-3 text-xl text-sky-700">Adulto #</h1>
      </div>
      <!-- Documento -->
      <div>
        <label for="dni">Documento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          <!-- TODO: Borrar los ID's de todos los inputs -->
          id="dni" 
          name="dni[]"
          required
          type="text"
          value="{{ old('dni') }}" />
        @error('dni')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('dni')}}</span
        >
        @enderror
      </div>

      <!-- Correo -->
      <div>
        <label for="email">Correo *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="email"
          name="email"
          required
          type="email"
          value="{{ old('email') }}" />
        @error('email')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('email')}}</span
        >
        @enderror
      </div>

      <!-- Nombre -->
      <div>
        <label for="name">Nombre *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="name"
          name="name"
          required
          type="text"
          value="{{ old('name') }}" />
        @error('name')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('name')}}</span
        >
        @enderror
      </div>

      <!-- Apellidos -->
      <div>
        <label for="surname">Apellidos *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="surname"
          name="surname"
          required
          type="text"
          value="{{old('surname')}}" />
        @error('surname')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('surname')}}</span
        >
        @enderror
      </div>

      <!-- Fecha Nacimiento -->
      <div>
        <label for="birth_date">Fecha de nacimiento *</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="birth_date"
          name="birth_date"
          required
          type="date"
          value="{{ old('birth_date') }}" />
        @error('birth_date')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('birth_date')}}</span
        >
        @enderror
      </div>

      <!-- Género -->
      <div>
        <label for="gender">Género</label>
        <select
          class="border-black-800 w-full rounded-xl border border-gray-400 p-1"
          id="gender"
          name="gender">
          <option value="">Seleccione una opcion</option>
          <option @if(old('gender')=='male' ) selected @endif value="male">Masculino</option>
          <option @if(old('gender')=='female' ) selected @endif value="female">Femenino</option>
          <option @if(old('gender')=='others' ) selected @endif value="others">Otros</option>
        </select>
      </div>

      <!-- Télefono -->
      <div>
        <label for="phone">Telefono</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="phone"
          name="phone"
          type="number"
          value="{{ old('phone') }}" />
        @error('phone')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('phone')}}</span
        >
        @enderror
      </div>

      <!-- Nombre de contacto -->
      <div>
        <label for="contact_name">Nombre de contacto</label>
        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="contact_name"
          name="contact_name"
          type="text"
          value="{{ old('contact_name') }}" />
        @error('contact_name')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('contact_name')}}</span
        >
        @enderror
      </div>

      <!-- Telefono de contacto -->
      <div class="col-span-2 justify-self-center">
        <label class="block" for="contact_phone"> Telefono de contacto </label>

        <input
          class="w-full rounded-xl border border-gray-400 p-1"
          id="contact_phone"
          name="contact_phone"
          type="number"
          value="{{ old('contact_phone') }}" />
        @error('contact_phone')
        <span class="text-red-500 font-semibold"
          >{{$errors->first('contact_phone')}}</span
        >
        @enderror
      </div>
    </div>
  </form>
</div>

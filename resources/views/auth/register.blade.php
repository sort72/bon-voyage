<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 px-2 gap-4">
                <!-- Name -->
                <div>
                    <x-label for="name" value="Nombres *" />

                    <x-input id="name" type="text" name="name" class="block mt-1 w-full" :value="old('name')" required autofocus />
                </div>

                <div>
                    <x-label for="surname" value="Apellidos *" />

                    <x-input id="surname" type="text" name="surname" class="block mt-1 w-full" :value="old('surname')" required />
                </div>

                <div>
                    <x-label for="email" value="Email *" />

                    <x-input id="email" type="email" name="email" class="block mt-1 w-full" :value="old('email')" required />
                </div>

                <div>
                    <x-label for="dni" value="Documento *" />

                    <x-input id="dni" type="text" name="dni" class="block mt-1 w-full" :value="old('dni')" required />
                </div>

                <div class="md:col-span-2">
                    <x-label for="birth_date" value="Fecha de nacimiento *" />

                    <x-input id="birth_date" type="text" name="birth_date" class="block mt-1 w-full flatpickr-birth" :value="old('birth_date')" required />
                </div>
            </div>
            <div class="grid grid-cols-1 px-2">
                @include('components.location-select')
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 px-2 gap-4 mt-4">

                <div>
                    <x-label for="address" value="Dirección de facturación *" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                </div>

                <div>
                    <x-label for="gender" value="Género *" />

                    <select name="gender" id="gender" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                        <option value="">Seleccione el género</option>
                        <option @if(old('gender') == 'male') selected @endif value="male">Masculino</option>
                        <option @if(old('gender') == 'female') selected @endif value="female">Femenino</option>
                        <option @if(old('gender') == 'others') selected @endif value="others">Otros</option>
                    </select>
                </div>

                <div>
                    <x-label for="password" value="Contraseña *" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" value="Confirmar contraseña *" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
            </div>

            <p class="italic my-2 text-sm px-2">
                Todos los campos marcados con * son obligatorios.
            </p>
            <div class="flex justify-center mt-4">
                <a class="underline text-sm text-sky-500 hover:text-sky-700" href="{{ route('login') }}">
                    {{ __('Ya tienes una cuenta? Inicia sesión') }}
                </a>
            </div>
            <div class="flex justify-center mt-4">
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

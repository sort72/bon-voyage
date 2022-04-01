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

            <div class="flex">
                <!-- Name -->
                <div class="w-1/2 px-2">
                    <x-label for="name" value="Nombres *" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <div class="w-1/2 px-2">
                    <x-label for="surname" value="Apellidos *" />

                    <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                </div>
            </div>
            <div class="flex mt-4">
                <!-- Email Address -->
                <div class="w-1/2 px-2">
                    <x-label for="email" value="Email *" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="w-1/2 px-2">
                    <x-label for="dni" value="Documento *" />

                    <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required />
                </div>
            </div>
            <div class="flex mt-4">
                <!-- Email Address -->
                <div class="w-1/2 px-2">
                    <x-label for="birth_date" value="Fecha de nacimiento *" />

                    <x-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required />
                </div>

                <div class="w-1/2 px-2">
                    <x-label for="birth_place" value="Lugar de nacimiento *" />
                    <x-input id="birth_place" class="block mt-1 w-full" type="text" name="birth_place" :value="old('birth_place')" required />
                </div>
            </div>
            <div class="flex mt-4">
                <!-- Email Address -->
                <div class="w-1/2 px-2">
                    <x-label for="gender" value="Género" />

                    <select name="gender" id="gender" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
                        <option value="">Seleccione el género</option>
                        <option value="female">Femenino</option>
                        <option value="male">Masculino</option>
                        <option value="others">Otros</option>
                    </select>
                </div>

                <div class="w-1/2 px-2">
                    <x-label for="address" value="Dirección de facturación *" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                </div>
            </div>

            <div class="flex mt-4">
                <!-- Password -->
                <div class="w-1/2 px-2">
                    <x-label for="password" value="Password *" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="w-1/2 px-2">
                    <x-label for="password_confirmation" value="Confirm Password *" />

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

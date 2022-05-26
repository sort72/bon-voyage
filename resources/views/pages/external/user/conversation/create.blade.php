@extends('layouts.external.layout')

@section('header', 'Iniciar conversación')

@section('content')

<div class="container mx-auto mt-8">
    <div>
        <div class="flex justify-between">
            <h3 class="text-blue-400 text-3xl font-semibold">Iniciar conversación</h3>
            <a class="text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-700" href="{{route('external.profile.conversation.index')}}">Volver al listado</a>
        </div>
        <div class="p-5 mt-4 border-b bg-white max-w-7xl mx-auto border-gray-200 sm:rounded-lg shadow-md">
            <form method="POST" action="{{route('external.profile.conversation.store')}}">
                @csrf
                <div class="grid grid-cols-1 gap-4">

                    <div class="mt-5">
                        <x-label>Mensaje</x-label>
                        <textarea rows="8" name="message" class="w-full h-full border border-gray-500 rounded-md placeholder:italic p-2 focus:outline focus:outline-sky-400 resize-none">{{ old('message') }}</textarea>
                        @error('message') <span class="text-red-500 font-semibold">{{$errors->first('message')}}</span> @enderror
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class=" my-2 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Enviar mensaje</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

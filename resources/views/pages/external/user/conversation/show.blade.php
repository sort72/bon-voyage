@extends('layouts.external.layout')
@section('header', 'Conversación ' . $conversation->id)
@section('content')

    <div class="max-w-5xl mx-auto py-6">
        <div class="flex justify-end">
            <a href="{{ route('external.profile.conversation.index') }}" class="bgs-sky-400 bg-sky-500 hover:bg-sky-600 text-white rounded shadow py-2 px-3">Volver al listado</a>
        </div>
        <div class="container my-2 mx-auto p-5 border rounded-lg border-gray-500 shadow-gray-400 shadow-lg">
            <form action="{{ route('external.profile.conversation.new-message', $conversation) }}"
                class="grid grid-cols-1 gap-4" method="POST">

                @csrf
                <!-- Titulo -->
                <h1 class="text-2xl font-bold text-sky-700">Conversación {{ $conversation->id }}</h1>

                <!-- Caja para mostrar mensajes -->
                <x-conversation-messages :conversation="$conversation" perspective="client" />

                @if ($conversation->status != 'closed')
                    <!-- Entrada de mensajes -->
                    <div class="justify-self-center w-3/4 h-28">
                        <textarea class="w-full h-full border border-gray-500 rounded-md placeholder:italic p-2 focus:outline focus:outline-sky-400 resize-none"
                            name="message" placeholder="Escriba aquí..."></textarea>
                        @error('message')
                            <span class="text-red-500 font-semibold">{{ $errors->first('message') }}</span>
                        @enderror
                    </div>

                    <!-- Botones formulario -->
                    <div class="w-4/5 flex justify-self-center justify-around mt-4">
                        <button type="submit" class="w-1/3 p-2 border-2 rounded-md bg-sky-400 text-white">
                            Enviar mensaje
                        </button>
                    </div>

                    <div class="w-4/5 flex justify-self-center justify-around mt-4">
                        <button id="end_conversation" type="button" class="w-1/3 p-2 border-2 rounded-md bg-red-600 text-white">
                            Finalizar conversación
                        </button>
                    </div>
                @endif
            </form>

            <form action="{{ route('external.profile.conversation.close', $conversation) }}" method="POST" id="close_conv">@csrf @method('PATCH')</form>
        </div>

        <script>
            const end_conversation = document.getElementById('end_conversation')
            const close_conv = document.getElementById('close_conv')

            end_conversation.addEventListener('click', (event) => {
                if(confirm('¿Estás seguro que deseas finalizar esta conversación?')) {
                    close_conv.submit()
                }
            })

        </script>
    </div>

@endsection

@extends('layouts.external.layout')
@section('header', 'Reservas activas')
@section('content')

<div class="w-7/12 mx-auto">
  <div class="container my-8 mx-auto p-5 border rounded-lg border-gray-500 shadow-gray-400 shadow-lg">
    <form action="#" class="grid grid-cols-1 gap-4" id="msg-form" name="msg-form">
      <!-- Titulo -->
      <h1 class="text-2xl font-bold text-sky-700">Conversación 12</h1>

      <!-- Caja para mostrar mensajes -->
      <div class="h-96 grid grid-cols-2 p-4 border border-gray-500 rounded-md">
        Area para los componentes de mensajes
      </div>

      <!-- Entrada de mensajes -->
      <div class="justify-self-center w-3/4 h-28">
        <textarea autofocus class="w-full h-full border border-gray-500 rounded-md placeholder:italic p-2 focus:outline focus:outline-sky-400" name="msg-box" id="msg-box" placeholder="Escriba aquí..."></textarea>
      </div>

      <!-- Botones formulario -->
      <div class="w-4/5 flex justify-self-center justify-around">
        <button class="w-1/3 p-2 border-2 rounded-md bg-sky-400 text-white">
          Enviar mensaje
        </button>
        <button class="w-1/3 flex-none p-2 border-2 rounded-md bg-red-400 text-white">
          Finalizar conversación
        </button>
      </div>
    </form>
  </div>

  <script>
    const msgBox = document.getElementById('msg-box')
    const msgForm = document.getElementById('msg-form')

    msgBox.addEventListener('keyup', (event) => {
      if (event.keyCode == 13)
        msgForm.submit()
    })
  </script>
</div>

@endsection
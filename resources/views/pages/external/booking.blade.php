
@extends('layouts.external.layout')

@section('header', 'Gestionar tiquetes')

@section('content')

<div class="container mx-auto">
  <div class="grid sm:grid-cols-1 sm:gap-6 md:grid-cols-2">

    <!-- contenedor información de reserva -->
    <div class="bg-green-600">
      <h1 class="text-xl truncate font-bold text-sky-700">
        Complete la siguiente información de reserva
      </h1> 
      <form action="" class="overflow-hidden">
        <!-- TODO: Recibir en la vista la cantidad de formularios que se van a mostrar -->
        <x-ticket-form-fields />
      </form>
    </div>

    <!-- contenedor detalle de pago y detalle de la compra -->
    <div class="bg-pink-600">
      <!-- Contenedor detalle del pago -->
      <div>
        <div>
          <p class="mb-3 text-xl font-bold text-sky-700">Detalle del pago</p>
        </div>

        <!-- Cuadro informacion -->
        <div
          class="border-2 border-gray-400 bg-white rounded-xl shadow-md p-4 overflow-hidden">
          <div class="font-semibold text-xs text-gray-600">
            <div class="grid grid-cols-2 mb-3">
              <span>Valor para una persona</span>
              <span class="justify-self-end">$240234</span>
            </div>

            <div class="grid grid-cols-2 mb-3">
              <!-- TODO: Agregar el icono que aparece en la historia de usuario -->
              <span>Impuestos, tasas y cargos</span>
              <span class="justify-self-end">$240234</span>
            </div>
          </div>

          <hr class="border-gray-400 my-3" />

          <div class="grid grid-cols-2 -mb-2 text-gray-600">
            <span class="font-semibold text-sm ml-1">TOTAL</span>
            <span class="font-bold text-xl justify-self-end">$240234</span>
          </div>
        </div>
      </div>

      <!-- Contenedor detalle de la compra -->
      <div>
        <div>
          <p class="mb-3 text-xl font-bold text-sky-700">
            Detalle de la compra
          </p>
        </div>

        <!-- Cuadro de informacion -->
        <div
          class="grid grid-cols-1 gap-y-6 text-gray-600 border-2 border-gray-400 bg-white shadow-md rounded-xl p-4 overflow-hidden">
          <div>
            <span class="block font-bold text-xl"
              >Pereira - Cartagena de Indias</span
            >
            <span class="font-semibold text-sm text-gray-400"
              >Ida y vuelta, 1 adulto</span
            >
          </div>

          <div>
            <span class="block font-semibold text-sm text-gray-400">IDA</span>
            <span class="font-semibold text-lg">02 mar 2022</span>
          </div>

          <div class="grid grid-cols-2">
            <span>Logo voyage</span>
            <span class="justify-self-end">Boton info</span>
          </div>

          <div>Información de hora salida y llegada</div>

          <hr class="border-gray-400 my-3" />
          <div>
            <span class="block font-semibold text-sm text-gray-400"
              >VUELTA</span
            >
            <span class="font-semibold text-lg">02 mar 2022</span>
          </div>
          <div>Información de hora salida y llegada</div>
        </div>
      </div>
      
    </div>
  </div>

</div>


<!-- Preguntas -->
<!-- 1. Como puedo hacer que cada uno de los formularios -->
<!--    tenga identificadores diferentes para cada uno de sus campos-->
<!--    a través de una propiedad o atributo y concatenarlo de alguna-->
<!--    manera dentro del componente ->

<!-- 2. Como puede incorporar los iconos a la vista esa de informaicón? -->
<!--    Que iconos debería utilizar para el caso de la aplicación bon-voyage? -->

@endsection

@extends('layouts.external.layout')

@section('header', 'Gestionar tiquetes')

@section('content')
<!-- TODO: Implementar el componente de formalario -->

<div class="container mx-auto">
  <div class="grid grid-cols-2 gap-6">
    <!-- contenedor información de reserva -->
    <div>
      <h1 class="mb-3 text-xl truncate font-bold text-sky-700">
        Complete la siguiente información de reserva
      </h1>
      <x-ticket-form />
    </div>

    <!-- contenedor detaller de pago y detalle de la compra -->
    <div>
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
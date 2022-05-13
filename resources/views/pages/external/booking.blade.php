@extends('layouts.external.layout')

@section('header', 'Gestionar reserva')

@section('content')

<div class="container mx-auto md:flex md:flex-wrap mt-8">

  <!-- contenedor información de reserva -->
  <div class="md:w-3/5 px-12 mb-12">
    <h1 class="text-xl truncate font-bold text-sky-700">
      Complete la siguiente información de reserva
    </h1>
    <form action="" class="overflow-hidden grid gap-3">
      @for ($index = 1; $index <= $number_of_adults; $index++)
      <x-ticket-form-fields :adultNumber="$index"/>
      @endfor

      <div class="flex justify-self-center items-center">
        <input class="rounded-md" name="agreement" require type="checkbox">
        <label for="agreement" class="block text-sm ml-3">Leí y acepto las condiciones de compra, políticas de privacidad y políticas de cambio y cancelaciones.</label>
      </div>

      <button class="rounded-xl bg-red-500 hover:bg-red-600 text-2xl p-2 text-white justify-self-center mt-2" type="submit">Realizar reserva</button>
    </form>
  </div>

  <!-- contenedor detalle de pago y detalle de la compra -->
  <div class="md:w-2/5 px-6 mb-12">
    <!-- Contenedor detalle del pago -->
    <div class="mb-6">
      <div>
        <h1 class="mb-3 text-xl font-bold text-sky-700">Detalle del pago</h1>
      </div>

      <!-- Cuadro informacion -->
      <div class="border-2 border-gray-400 bg-white rounded-xl shadow-md p-4 overflow-hidden">
        <div class="font-semibold text-xs text-gray-600">
          <div class="grid grid-cols-2 mb-3">
            <span>Valor para una persona</span>
            <span class="justify-self-end">$240234</span>
          </div>

          <div class="grid grid-cols-2 mb-3">
            <span>Impuestos, tasas y cargos <a href="#" class="text-sky-700"><i class="fa-solid fa-circle-info"></i></a></span>
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
        <h1 class="mb-3 text-xl font-bold text-sky-700">
          Detalle de la compra
        </h1>
      </div>

      <!-- Cuadro de informacion -->
      <div class="grid grid-cols-1 gap-y-6 text-gray-600 border-2 border-gray-400 bg-white shadow-md rounded-xl p-4 overflow-hidden">
        <div>
          <div class="text-sky-700 text-xl">
            <i class="block fa-solid fa-plane"></i>
          </div>
          <span class="block font-bold text-xl">Pereira - Cartagena de Indias</span>
          <span class="font-semibold text-sm text-gray-400">Ida y vuelta, 1 adulto</span>
        </div>

        <div>
          <span class="block font-semibold text-sm text-gray-400">IDA</span>
          <span class="font-semibold text-lg">02 mar 2022</span>
        </div>


        <!-- Información de hora de salia tipo de vuelo hora de llegada y duración -->
        <div>
          <div class="grid grid-cols-2 items-center -mt-2 mb-4">
            <span><img class="h-5 w-auto" src="{{asset('images/logo.png')}}" alt="logo_bon_voyage"></span>
            <div class="justify-self-end text-sky-700 text-lg">
              <a href="#">
                <i class="block fa-solid fa-circle-info"></i>
              </a>
            </div>
          </div>

          <div class="flex flex-wrap justify-between">
            <div>
              <span class="font-semibold text-gray-400">PEI</span>
              <span class="block font-bold">17:50</span>
            </div>
            <div class="font-semibold underline underline-offset-8 text-sky-700">Directo</div>
            <div>
              <span class="font-semibold text-gray-400">CTG</span>
              <span class="block font-bold">19:09</span>
            </div>
            <div>
              <span class="font-semibold text-gray-400">Duración</span>
              <span class="block font-bold">1h 19m</span>
            </div>
          </div>

          <div class="text-gray-600 mt-4">
            <i class="fa-solid fa-bag-shopping hover:text-sky-700"></i>
            <i class="fa-solid fa-suitcase hover:text-sky-700"></i>
            <i class="fa-solid fa-suitcase-rolling hover:text-sky-700"></i>
          </div>
        </div>

        <hr class="border-gray-400" />
        <div>
          <div class="text-sky-700 text-xl">
            <i class="block rotate-180 fa-solid fa-plane"></i>
          </div>
          <span class="block font-semibold text-sm text-gray-400">VUELTA</span>
          <span class="font-semibold text-lg">02 mar 2022</span>
        </div>
        <!-- Información de hora de salida tipo de vuelo hora de llegada y duración -->
        <div>
          <div class="grid grid-cols-2 items-center -mt-2 mb-4">
            <span><img class="h-5 w-auto" src="{{asset('images/logo.png')}}" alt="logo_bon_voyage"></span>
            <div class="justify-self-end text-sky-700 text-lg">
              <a href="#">
                <i class="block fa-solid fa-circle-info"></i>
              </a>
            </div>
          </div>

          <div class="flex flex-wrap justify-between">
            <div>
              <span class="font-semibold text-gray-400">CTG</span>
              <span class="block font-bold">11:20</span>
            </div>
            <div class="font-semibold underline underline-offset-8 text-sky-700">Directo</div>
            <div>
              <span class="font-semibold text-gray-400">PEI</span>
              <span class="block font-bold">12:47</span>
            </div>
            <div>
              <span class="font-semibold text-gray-400">Duración</span>
              <span class="block font-bold">1h 27m</span>
            </div>
          </div>

          <div class="text-gray-600 mt-4">
            <i class="fa-solid fa-bag-shopping hover:text-sky-700"></i>
            <i class="fa-solid fa-suitcase hover:text-sky-700"></i>
            <i class="fa-solid fa-suitcase-rolling hover:text-sky-700"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
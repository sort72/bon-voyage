<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-white mb-0">
    <div class="max-w-7xl pl-2 sm:pl-6 lg:pl-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <img class="block h-10 w-auto" src="{{asset('images/logo.png')}}" alt="logo_bon_voyage">
          </div>
        </div>
        <div class="h-12 w-2/5 self-start justify-center rounded-bl bg-gray-200 md:flex items-center hidden">
            <a href="@if(auth()->user()) {{route('external.profile.edit')}} @else {{ route('login') }} @endif" class="mr-2 flex p-1 rounded text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <i class="fa-solid fa-user mt-1 mr-2"></i>
                <span class="">@if(auth()->user()) {{auth()->user()->name}} {{auth()->user()->surname}} @else Iniciar sesi??n @endif</span>
            </a>
            @if(auth()->user())
                <a href="{{ route('external.profile.purchases-list') }}" class="mr-2 flex p-1 rounded text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <i class="fa-solid fa-suitcase mt-1 mr-2"></i>
                    <span class="">Mis viajes</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="navbar-item desktop-icon-only">
                    @csrf

                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="mr-2  p-1 rounded text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Cerrar sesi??n</span>
                    </a>
                </form>
            @endif
        </div>
      </div>
      <div class="mx-auto mb-2 px-2 sm:px-6 lg:px-8 flex-1 sm:items-stretch sm:justify-start">
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">

            <a href="{{ route('external.index') }}"  class="{{ Route::is('external.index') ? 'border-b-2 border-sky-500 text-sky-500' : 'text-gray-400 rounded-md' }} hover:bg-sky-500 hover:text-white hover:rounded px-2 py-2  text-sm font-medium" aria-current="page">
                <div class="text-center">
                    <i class="block fa-solid fa-plane-up"></i>
                    <span class="block w-full">Vuelos</span>
                </div>
            </a>

            <a href="{{ route('external.checkin') }}" class="{{ Route::is('external.checkin') ? 'border-b-2 border-sky-500 text-sky-500' : 'text-gray-400 rounded-md' }} hover:bg-sky-500 hover:text-white hover:rounded px-2 py-2  text-sm font-medium" aria-current="page">
                <div class="text-center">
                    <i class="block fa-solid fa-suitcase"></i>
                    <span class="block w-full">Check-in</span>
                </div>
            </a>
            @if(auth()->user())
                <a href="{{ route('external.profile.card.index') }}" class="{{ Route::is('external.profile.card.index') ? 'border-b-2 border-sky-500 text-sky-500' : 'text-gray-400 rounded-md' }} hover:bg-sky-500 hover:text-white hover:rounded px-2 py-2  text-sm font-medium" aria-current="page">
                    <div class="text-center">
                        <i class="block fa-solid fa-credit-card"></i>
                        <span class="block w-full">Mis tarjetas</span>
                    </div>
                </a>

                <a href="{{ route('external.profile.booking-list') }}" class="{{ Route::is('external.profile.booking-list') ? 'border-b-2 border-sky-500 text-sky-500' : 'text-gray-400 rounded-md' }} hover:bg-sky-500 hover:text-white hover:rounded px-2 py-2  text-sm font-medium" aria-current="page">
                    <div class="text-center">
                        <i class="block fa-solid fa-couch"></i>
                        <span class="block w-full">Mis reservas</span>
                    </div>
                </a>


                <a href="{{ route('external.profile.conversation.index') }}" class="{{ Route::is('external.profile.conversation.index') ? 'border-b-2 border-sky-500 text-sky-500' : 'text-gray-400 rounded-md' }} hover:bg-sky-500 hover:text-white hover:rounded px-2 py-2  text-sm font-medium" aria-current="page">
                    <div class="text-center">
                        <i class="block fa-solid fa-message"></i>
                        <span class="block w-full">Mi muro</span>
                    </div>
                </a>

                <a href="{{ route('external.profile.cart') }}" class="{{ Route::is('external.profile.cart') ? 'border-b-2 border-sky-500 text-sky-500' : 'text-gray-400 rounded-md' }} hover:bg-sky-500 hover:text-white hover:rounded px-2 py-2  text-sm font-medium" aria-current="page">
                    <div class="text-center">
                        <i class="block fa-solid fa-cart-plus"></i>
                        <span class="block w-full">Carrito de compras</span>
                    </div>
                </a>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">

        <a href="{{ route('external.index') }}" class="{{ Route::is('external.index') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page"><i class="block fa-solid fa-plane-up mt-1 mr-2"></i> Vuelos</a>

        <a href="{{ route('external.checkin') }}" class="{{ Route::is('external.checkin') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="block fa-solid fa-suitcase mt-1 mr-2"></i> Check-in</a>
        @if(auth()->user())

            <a href="{{ route('external.profile.card.index') }}" class="{{ Route::is('external.profile.card.index') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page"><i class="block fa-solid fa-credit-card mt-1 mr-2"></i> Mis tarjetas</a>

            <a href="{{ route('external.profile.booking-list') }}" class="{{ Route::is('external.profile.booking-list') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="block fa-solid fa-couch mt-1 mr-2"></i> Mis reservas</a>

            <a href="{{ route('external.profile.conversation.index') }}" class="{{ Route::is('external.profile.conversation.index') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="block fa-solid fa-message mt-1 mr-2"></i> Mi muro</a>

            <a href="{{ route('external.profile.cart') }}" class="{{ Route::is('external.profile.cart') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="block fa-solid fa-cart-plus mt-1 mr-2"></i> Carrito de compras</a>

            <a href="{{route('external.profile.edit')}}" class="{{ Route::is('external.profile.edit') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-user mt-1 mr-2"></i> {{auth()->user()->name}} {{auth()->user()->surname}}</a>

            <a href="{{ route('external.profile.purchases-list') }}" class="{{ Route::is('external.profile.purchases-list') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-suitcase mt-1 mr-2"></i> Mis viajes</a>

            <form method="POST" action="{{ route('logout') }}" class="navbar-item desktop-icon-only">
                @csrf

                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="{{ Route::is('logout') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fa-solid fa-arrow-right-from-bracket mt-1 mr-2"></i>
                    <span>Cerrar sesi??n</span>
                </a>
            </form>
        @else
            <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'bg-sky-500 text-white' : 'text-gray-400' }} focus:bg-sky-500 focus:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-user mt-1 mr-2"></i> Iniciar sesi??n</a>
        @endif
      </div>
    </div>
  </nav>

<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>


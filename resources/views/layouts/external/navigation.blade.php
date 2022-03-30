<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-white mb-0">
    <div class="max-w-7xl pl-2 sm:pl-6 lg:pl-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
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
        <div class="h-12 w-1/3 self-start justify-center rounded-bl bg-gray-200 md:flex items-center hidden">
            <a href="{{ route('login') }}" class="mr-2 flex p-1 rounded text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <i class="fa-solid fa-user mt-1 mr-2"></i>
                <span class="">Iniciar sesión</span>
            </a>
            <button type="button" class="mr-2 flex p-1 rounded text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <i class="fa-solid fa-suitcase mt-1 mr-2"></i>
                <span class="">Mis viajes</span>
            </button>
            <button type="button" class="mr-2 flex p-1 rounded text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <i class="fa-solid fa-circle-question mt-1 mr-2"></i>
                <span class="">Ayuda</span>
            </button>
        </div>
      </div>
      <div class="mx-auto mb-2 px-2 sm:px-6 lg:px-8 flex-1 sm:items-stretch sm:justify-start">
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="hover:bg-sky-500 hover:text-white text-gray-400 px-2 py-2 rounded-md text-sm font-medium" aria-current="page">
                <div class="text-center">
                    <i class="block fa-solid fa-plane-up"></i>
                    <span class="block w-full">Vuelos</span>
                </div>
            </a>

            <a href="#" class="hover:bg-sky-500 hover:text-white text-gray-400 px-2 py-2 rounded-md text-sm font-medium" aria-current="page">
                <div class="text-center">
                    <i class="block fa-solid fa-fire"></i>
                    <span class="block w-full">Ofertas</span>
                </div>
            </a>

            <a href="#" class="hover:bg-sky-500 hover:text-white text-gray-400 px-2 py-2 rounded-md text-sm font-medium" aria-current="page">
                <div class="text-center">
                    <i class="block fa-solid fa-suitcase"></i>
                    <span class="block w-full">Check-in</span>
                </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Vuelos</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Ofertas</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Check-in</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Iniciar sesión</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Mis viajes</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Ayuda</a>
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


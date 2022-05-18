@if (session('success'))
    <div class="bg-green-600 h-12 w-full py-3 px-2 text-center text-white">
        {{ session('success') }}
    </div>
@elseif (session('danger'))
    <div class="bg-red-600 h-12 w-full py-3 px-2 text-center text-white">
        {{ session('danger') }}
    </div>
@endif

<nav id="navbar-main" class="lg:flex lg:items-stretch top-0 left-0 right-0 fixed flex bg-white h-14 border-b border-gray-100 z-30 w-screen transition-all
lg:pl-60 lg:w-auto is-fixed-top">
    <div class="flex-1 items-stretch flex h-14">
        <button type="button" class="lg:hidden mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:text-sky-500 hover:text-sky-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="flex-1 items-rigth mr-6">
        <button type="button" class="float-right flex mt-2 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="https://avatars.dicebear.com/v2/initials/{{Auth()->user()->name}}.svg" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="hidden  md:w-1/3 md:float-right my-10 md:my-8 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
          <ul class="py-1" aria-labelledby="dropdown">
            <li>
              <a href="#" class="flex block py-2 px-3 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <img src="https://avatars.dicebear.com/v2/initials/{{Auth()->user()->name}}.svg" alt="Usuario" class="rounded-full w-6 h-6">
                <span class="ml-4 block text-sm text-gray-900 dark:text-white">{{Auth()->user()->name}}</span>
              </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="flex block py-2 px-3 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();" title="Cerrar sesión">
                        <span class="inline-flex justify-center items-center w-6 h-6"><i class="mdi mdi-logout"></i></span>
                        <span>Cerrar sesión</span>
                    </a>
                </form>
            </li>
          </ul>
        </div>
      </button>
    </div>
</nav>
<aside class="w-60 left-60 fixed top-0 z-40 h-screen bg-sky-500 transition-all md:left-0 self-start lg:inline-block hidden">
    <div class="flex flex-row w-full bg-white text-white flex-1 px-3 h-14 items-center">
        <div class="font-black text-lg text-center">
            <img class="block h-10 w-auto" src="{{asset('images/logo.png')}}" alt="logo_bon_voyage">
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="p-3 text-xs uppercase text-white">General</p>
        <ul>
            <li class="{{Route::is('dashboard.index') ? 'active' : ''}} active:bg-sky-400">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="flex-grow">Dashboard</span>
                </a>
            </li>

            @if(Auth()->user()->role === 'root')
            <li class="{{Route::is('dashboard.list-admin') || Route::is('dashboard.create-admin') ? 'active' : ''}}  active:bg-sky-400">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.list-admin')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-shield-crown"></i></span>
                    <span class="flex-grow">Administradores</span>
                </a>
            </li>
            @else
            <li class="{{Route::is('dashboard.destination*') ? 'active'  : ''}} active:bg-sky-400">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.destination.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-map-marker"></i></span>
                    <span class="flex-grow">Destinos</span>
                </a>
            </li>

            <li class="{{Route::is('dashboard.flight*') ? 'active' : ''  }} active:bg-sky-400">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.flight.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-airplane"></i></span>
                    <span class="flex-grow">Vuelos</span>
                </a>
            </li>
            {{-- <li class="{{Route::is('dashboard.inbox*') ? 'active' : ''}  }">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.inbox.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6"><i class="mdi mdi-message-bulleted"></i></span>
                    <span class="flex-grow">Mensajes privados</span>
                </a>
            </li> --}}
            @endif


        </ul>
    </div>
</aside>
<!-- Mobile menu, show/hide based on menu state. -->
<div class="hidden mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 bg-sky-500">
        <p class="text-xl text-white">General</p>
        <ul>
            <li class="{{Route::is('dashboard.index') ? 'active' : ''}} active:bg-sky-400 rounded">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-desktop-mac text-white"></i></span>
                    <span class="text-base text-white">Dashboard</span>
                </a>
            </li>

            @if(Auth()->user()->role === 'root')
            <li class="{{Route::is('dashboard.list-admin') || Route::is('dashboard.create-admin') ? 'active' : ''}} active:bg-sky-400 rounded">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.list-admin')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-shield-crown text-white"></i></span>
                    <span class="text-base text-white">Administradores</span>
                </a>
            </li>
            @else
            <li class="{{Route::is('dashboard.destination*') ? 'active'   : ''}} active:bg-sky-400 rounded">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.destination.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-map-marker text-white"></i></span>
                    <span class="text-base text-white">Destinos</span>
                </a>
            </li>

            <li class="{{Route::is('dashboard.flight*') ? 'active' : ''  }} active:bg-sky-400 rounded">
                <a class="py-2 flex text-white hover:bg-sky-400" href="{{route('dashboard.flight.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6 px-6"><i class="mdi mdi-airplane text-white"></i></span>
                    <span class="text-base text-white">Vuelos</span>
                </a>
            </li>
            {{-- <li class="{{Route::is('dashboard.inbox*') ? 'active' : ''}  }">
                <a href="{{route('dashboard.inbox.index')}}">
                    <span class="inline-flex justify-center items-center w-6 h-6"><i class="mdi mdi-message-bulleted"></i></span>
                    <span class="flex-grow">Mensajes privados</span>
                </a>
            </li> --}}
            @endif


        </ul>
    </div>
</div>
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });

    const targetEl = document.getElementById('user-menu-button');
    const user_menu = document.getElementById('dropdown');

    targetEl.addEventListener("click", () => {
        user_menu.classList.toggle("hidden");
    });

</script>

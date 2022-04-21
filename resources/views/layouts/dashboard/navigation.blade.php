@if (session('success'))
    <div class="bg-green-600 h-12 w-full py-3 px-2 text-center text-white">
        {{ session('success') }}
    </div>
@elseif (session('danger'))
    <div class="bg-red-600 h-12 w-full py-3 px-2 text-center text-white">
        {{ session('danger') }}
    </div>
@endif

<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:text-sky-600 hover:text-sky-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
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
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-divider has-user-avatar">
                <div class="user-avatar">
                    <img src="https://avatars.dicebear.com/v2/initials/{{Auth()->user()->name}}.svg" alt="Usuario"
                        class="rounded-full">
                </div>
                <div class="is-user-name"><span>{{Auth()->user()->name}}</span></div>
            </div>


            <form method="POST" action="{{ route('logout') }}" class="navbar-item desktop-icon-only">
                @csrf

                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" title="Cerrar sesión">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>Cerrar sesión</span>
                </a>
            </form>
        </div>
    </div>
</nav>
<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div class="font-black text-lg">
            {{ config('app.name', 'Laravel') }}
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="{{Route::is('dashboard.index') ? 'active' : ''}}">
                <a href="{{route('dashboard.index')}}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>

            @if(Auth()->user()->role === 'root')
            <li class="{{Route::is('dashboard.list-admin') || Route::is('dashboard.create-admin') ? 'active' : ''}}">
                <a href="{{route('dashboard.list-admin')}}">
                    <span class="icon"><i class="mdi mdi-shield-crown"></i></span>
                    <span class="menu-item-label">Administradores</span>
                </a>
            </li>
            @else
            <li class="{{Route::is('dashboard.destination*') ? 'active' : ''}}">
                <a href="{{route('dashboard.destination.index')}}">
                    <span class="icon"><i class="mdi mdi-map-marker"></i></span>
                    <span class="menu-item-label">Destinos</span>
                </a>
            </li>

            <li class="{{Route::is('dashboard.flight*') ? 'active' : ''}}">
                <a href="{{route('dashboard.flight.index')}}">
                    <span class="icon"><i class="mdi mdi-airplane"></i></span>
                    <span class="menu-item-label">Vuelos</span>
                </a>
            </li>
            {{-- <li class="{{Route::is('dashboard.inbox*') ? 'active' : ''}}">
                <a href="{{route('dashboard.inbox.index')}}">
                    <span class="icon"><i class="mdi mdi-message-bulleted"></i></span>
                    <span class="menu-item-label">Mensajes privados</span>
                </a>
            </li> --}}
            @endif


        </ul>
    </div>
</aside>
<!-- Mobile menu, show/hide based on menu state. -->
<div class="hidden mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page"><i class="block fa-solid fa-plane-up"></i>  Vuelos</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="block fa-solid fa-fire"></i> Ofertas</a>

        <a href="#" class="focus:bg-sky-600 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="block fa-solid fa-suitcase"></i> Check-in</a>
    </div>
</div>
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>

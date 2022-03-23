@if (session('success'))
    <div class="bg-green-600 h-12 w-full py-3 px-2 text-center text-white">
        {{ session('success') }}
    </div>
@endif

<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
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
            <li class="{{Route::is('dashboard.create-admin') ? 'active' : ''}}">
                <a href="{{route('dashboard.create-admin')}}">
                    <span class="icon"><i class="mdi mdi-shield-crown"></i></span>
                    <span class="menu-item-label">Crear administrador</span>
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
            <li class="{{Route::is('dashboard.inbox*') ? 'active' : ''}}">
                <a href="{{route('dashboard.inbox.index')}}">
                    <span class="icon"><i class="mdi mdi-message-bulleted"></i></span>
                    <span class="menu-item-label">Mensajes privados</span>
                </a>
            </li>
            @endif


        </ul>
    </div>
</aside>

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
            <img src="https://avatars.dicebear.com/v2/initials/{{Auth()->user()->name}}.svg" alt="Usuario" class="rounded-full">
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
          {{-- {{Route::is('admin.index') ? 'active' : ''}} --}}
        <li class="active">
          <a href="">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>


<div class="dashboard-nav">
    <header>
        <a href="#" class="menu-toggle"><i class="fas fa-bars"></i></a>
        <a href="#" class="brand-logo">
            <i class="fa fa-tv"></i> <small class="text-muted"> Streaming  </small>
        </a>
    </header>



    <nav class="dashboard-nav-list">

        <a href="{{ route('home') }}" class="dashboard-nav-item {{ request()->routeIs('home*') ? 'active' : '' }}">
            <i class="fas fa-home"></i>Home
        </a>

        <a href="{{ route('cuentas') }}" class="dashboard-nav-item {{ request()->routeIs('cuentas*') ? 'active' : '' }}">
            <i class="fas fa-tv"></i>Cuentas
        </a>

        <a href="{{ route('cajas') }}" class="dashboard-nav-item {{ request()->routeIs('cajas*') ? 'active' : '' }}">
            <i class="fas fa-money-bill"></i>Cajas
        </a>
        <a href="{{ route('movimientos') }}" class="dashboard-nav-item {{ request()->routeIs('movimientos*') ? 'active' : '' }}">
            <i class="fas fa-money-check"></i>Movimientos
        </a>

        <a href="{{ route('clientes') }}" class="dashboard-nav-item {{ request()->routeIs('clientes*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>Clientes
        </a>


        <a href="{{ route('ventas') }}" class="dashboard-nav-item {{ request()->routeIs('ventas*') ? 'active' : '' }}">
            <i class="fa fa-car-battery"></i>Ventas
        </a>

        <div class='dashboard-nav-dropdown {{ request()->routeIs('users*') ? 'show' : '' }}'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Usuarios </a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="{{ route('users') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('users') ? 'active' : '' }}">Todos</a>
                <a href="{{ route('users.create') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('users.create') ? 'active' : '' }}">Nuevo</a>
            </div>
        </div>
        <a href="{{ route('profile') }}" class="dashboard-nav-item {{ request()->routeIs('profile*') ? 'active' : '' }}"><i class="fas fa-user"></i> Perfil </a>




        <div class="nav-item-divider"></div>
        <a href="{{ route('logout') }}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
    </nav>
</div>

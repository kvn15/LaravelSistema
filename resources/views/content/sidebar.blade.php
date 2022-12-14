<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">AdminSystem</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">AS</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fab fa-dashcube"></i> <span>Dashboard</span></a></li>
        @can('admin.*')
        <li class="dropdown {{ request()->routeIs('admin.*.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-toolbox"></i><span>Administración</span></a>
            <ul class="dropdown-menu">
              @can('admin.proveedor.index')<li class="{{ request()->routeIs('admin.proveedor.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.proveedor.index') }}">Proveedores</a></li>@endcan
              @can('admin.cliente.index')<li class="{{ request()->routeIs('admin.cliente.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.cliente.index') }}">Clientes</a></li>@endcan
              @can('admin.categoria.index')<li class="{{ request()->routeIs('admin.categoria.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.categoria.index') }}">Categorias</a></li>@endcan
              @can('admin.marca.index')<li class="{{ request()->routeIs('admin.marca.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.marca.index') }}">Marca</a></li>@endcan
              @can('admin.personal.index')<li class="{{ request()->routeIs('admin.personal.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.personal.index') }}">Personal</a></li>@endcan
              @can('admin.caja.index')<li class="{{ request()->routeIs('admin.caja.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.caja.index') }}">Caja</a></li>@endcan
              @can('admin.presentacion.index')<li class="{{ request()->routeIs('admin.presentacion.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.presentacion.index') }}">Presentación</a></li>@endcan
            </ul>
        </li>
        @endcan

        <li><a class="nav-link" href="blank.html"><i class="fas fa-box-open"></i> <span>Productos</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-hand-holding-usd"></i> <span>Compras</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-money-bill"></i> <span>Ventas</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-cash-register"></i> <span>Movimientos de Caja</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-exchange-alt"></i> <span>Devolución</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-boxes"></i> <span>Kardex</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-file-alt"></i> <span>Reportes</span></a></li>

        @can('config.*')
        <li class="dropdown {{ request()->routeIs('config.*.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Configuración</span></a>
            <ul class="dropdown-menu">
                @can('config.roles.index')<li class="{{ request()->routeIs('config.roles.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('config.roles.index') }}">Roles</a></li>@endcan
                @can('config.user.index')<li class="{{ request()->routeIs('config.user.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('config.user.index') }}">Usuarios</a></li>@endcan
              <li><a class="nav-link" href="#">Datos Empresa</a></li>
              <li><a class="nav-link" href="#">Ajustes de Cuentas</a></li>
            </ul>
        </li>
        @endcan

      </ul>
    </aside>
  </div>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a href="{{ url('admin/dashboard') }}" class="nav-link">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/order') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/movie') }}" class="nav-link">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Movies</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/genre') }}" class="nav-link">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Genre</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/language/view') }}" class="nav-link">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Languages</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('admin/user') }}" class="nav-link">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">User</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('/store') }}" class="nav-link">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Store</span>
        </a>
      </li>


    </ul>
  </nav>

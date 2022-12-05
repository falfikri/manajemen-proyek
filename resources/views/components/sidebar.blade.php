<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Main Menu</li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('todo.index') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('finish') }}">
          <span class="icon-bg"><i class="mdi mdi-database menu-icon"></i></span>
          <span class="menu-title">Progres Selesai</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="{{ route('onprogres') }}">
          <span class="icon-bg"><i class="mdi mdi-database menu-icon"></i></span>
          <span class="menu-title">Progres Berlangsung</span>
        </a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="{{ route('delay') }}">
          <span class="icon-bg"><i class="mdi mdi-database menu-icon"></i></span>
          <span class="menu-title">Progres Terhenti</span>
        </a>
      </li>
    </ul>
  </nav>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>

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


      <li class="nav-item sidebar-user-actions">
        <div class="user-details">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="d-flex align-items-center">
                <div class="sidebar-profile-img">
                  <img src="{{ asset('assets/images/faces/face28.png') }}" alt="image">
                </div>
                <div class="sidebar-profile-text">
                  <p class="mb-1">

                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      
      
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span></a>
        </div>
      </li>
    </ul>
  </nav>
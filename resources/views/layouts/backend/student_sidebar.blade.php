<div class="site-menubar-body">
  <div>
    <div>
      <ul class="site-menu" data-plugin="menu">
        <!-- <li class="site-menu-category">General</li> -->
        <li class="site-menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('student.dashboard') }}">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('mapel') ? 'active' : '' }}">
            <a href="#">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Mata Pelajaran</span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('mapel') ? 'active' : '' }}">
            <a href="#">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Tugas</span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('mapel') ? 'active' : '' }}">
            <a href="#">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Jadwal</span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('mapel') ? 'active' : '' }}">
            <a href="#">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Profil</span>
            </a>
        </li>
      </ul>

      
    </div>
  </div>
</div>
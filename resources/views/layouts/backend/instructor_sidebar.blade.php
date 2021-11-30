<div class="site-menubar-body">
  <ul class="site-menu" data-plugin="menu">
    <li class="site-menu-item {{ request()->is('instructor-dashboard') ? 'active' : '' }}">
      <a href="{{ route('instructor.dashboard') }}">
        <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
        <span class="site-menu-title">Dashboard</span>
      </a>
    </li>
    <li class="site-menu-item {{ request()->is('instructor-profile') ? 'active' : '' }}">
      <a href="{{ route('instructor.profile.get') }}">
        <i class="site-menu-icon fas fa-user" aria-hidden="true"></i>
        <span class="site-menu-title">Profile</span>
      </a>
    </li>
    <li class="site-menu-item {{ request()->is('instructor-course-*') ? 'active' : '' }}">
      <a href="{{ route('instructor.course.list') }}">
        <i class="site-menu-icon fas fa-chalkboard" aria-hidden="true"></i>
        <span class="site-menu-title">Courses</span>
      </a>
    </li>
    <li class="site-menu-item {{ request()->is('instructor-absensi-*') ? 'active' : '' }}">
      <a href="{{ route('instructor.absensi.list') }}">
        <i class="site-menu-icon fas fa-clipboard-list" aria-hidden="true"></i>
        <span class="site-menu-title">Absensi</span>
      </a>
    </li>
  </ul>
</div>

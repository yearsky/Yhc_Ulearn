<div class="site-menubar-body">
  <div>
    <div>
      <ul class="site-menu" data-plugin="menu">
        <!-- <li class="site-menu-category">General</li> -->
        <li class="site-menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
            </a>
        </li>
        <li class="site-menu-item has-sub {{ request()->is('admin/user/*') ? 'active open' : '' }}">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                <span class="site-menu-title">Users Management</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item {{ request()->is('admin/user/siswa/*') ? 'active' : '' }}">
                  <a href="{{ route('admin.siswa.list') }}">
                    <span class="site-menu-title">Siswa</span>
                  </a>
                </li>
                <li class="site-menu-item {{ request()->is('admin/user/guru/*') ? 'active' : '' }}">
                  <a href="{{ route('admin.guru.list') }}">
                    <span class="site-menu-title">Guru</span>
                  </a>
                </li>
               
            </ul>
        </li>
        <li class="site-menu-item {{ request()->is('admin/categor*') ? 'active' : '' }}">
            <a href="{{ route('admin.categories') }}">
                <i class="site-menu-icon wb-tag" aria-hidden="true"></i>
                <span class="site-menu-title">Categories</span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('admin-course-*') ? 'active' : '' }}">
            <a href="{{ route('admin.course.list') }}">
                <i class="site-menu-icon fas fa-chalkboard" aria-hidden="true"></i>
                <span class="site-menu-title">Courses</span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('admin/penjadwalan/*') ? 'active' : '' }}">
            <a href="{{ route('admin.penjadwalan.list') }}">
                <i class="site-menu-icon fas fa-chalkboard" aria-hidden="true"></i>
                <span class="site-menu-title">Penjadwalan </span>
            </a>
        </li>
        <li class="site-menu-item {{ request()->is('admin/absensi/*') ? 'active' : '' }}">
            <a href="{{ route('admin.absensi.list') }}">
                <i class="site-menu-icon fas fa-chalkboard" aria-hidden="true"></i>
                <span class="site-menu-title">Absensi </span>
            </a>
        </li>
        <!-- <li class="site-menu-item {{ request()->is('admin/withdraw-requests') ? 'active' : '' }}">
            <a href="{{ route('admin.withdraw.requests') }}">
                <i class="site-menu-icon fas fa-hand-holding-usd" aria-hidden="true"></i>
                <span class="site-menu-title">Withdraw Requests</span>
            </a>
        </li> -->
        <li class="site-menu-item {{ request()->is('admin/blog*') ? 'active' : '' }}">
            <a href="{{ route('admin.blogs') }}">
                <i class="site-menu-icon fas fa-blog" aria-hidden="true"></i>
                <span class="site-menu-title">Blogs</span>
            </a>
        </li>

        <li class="site-menu-item has-sub {{ request()->is('admin/config/page-*') ? 'active open' : '' }}">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                <span class="site-menu-title">Pages</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item {{ request()->is('admin/config/page-home') ? 'active' : '' }}">
                  <a href="{{ route('admin.pageHome') }}">
                    <span class="site-menu-title">Home</span>
                  </a>
                </li>
                <li class="site-menu-item {{ request()->is('admin/config/page-about') ? 'active' : '' }}">
                  <a href="{{ route('admin.pageAbout') }}">
                    <span class="site-menu-title">About Us</span>
                  </a>
                </li>
                <li class="site-menu-item {{ request()->is('admin/config/page-contact') ? 'active' : '' }}">
                  <a href="{{ route('admin.pageContact') }}">
                    <span class="site-menu-title">Contact Us</span>
                  </a>
                </li>
                <li class="site-menu-item {{ request()->is('admin/gallery') ? 'active' : '' }}">
                  <a href="{{ route('admin.gallery') }}">
                    <span class="site-menu-title">Gallery</span>
                  </a>
                </li>
            </ul>
        </li>

        <li class="site-menu-item has-sub {{ request()->is('admin/config/setting-*') ? 'active open' : '' }}">
            <a href="javascript:void(0)">
                <i class="site-menu-icon fas fa-cogs" aria-hidden="true"></i>
                <span class="site-menu-title">Settings</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item {{ request()->is('admin/config/setting-general') ? 'active' : '' }}">
                  <a href="{{ route('admin.settingGeneral') }}">
                    <span class="site-menu-title">General</span>
                  </a>
                </li>
                <li class="site-menu-item {{ request()->is('admin/config/*') ? 'active' : '' }}">
                  <a href="{{ route('admin.showSlider') }}">
                    <span class="site-menu-title">Slider</span>
                  </a>
                </li>
                <!-- <li class="site-menu-item {{ request()->is('admin/config/setting-email') ? 'active' : '' }}">
                  <a href="{{ route('admin.settingEmail') }}">
                    <span class="site-menu-title">Email</span>
                  </a>
                </li> -->
            </ul>
        </li>
        
      </ul>

      
    </div>
  </div>
</div>
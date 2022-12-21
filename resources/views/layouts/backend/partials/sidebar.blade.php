 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/')}}" class="brand-link">
      <!-- <img src="{{ asset('assets/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Journal</span>
    </a>
    @if (auth()->user()->is_admin == 1 )
      <!-- Sidebar admin -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->admin_info )
          <img src="{{asset('assets/profile/'.auth()->user()->admin_info->image)}}" class="img-circle elevation-2" alt="User Image">
            
          @else
            <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ url('admin/show_profile') }}" class="d-block">{{ auth()->user()->user_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('dashboard')">
               <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/home') }}" class="nav-link @yield('admin_home')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @yield('account')">
             <i class="fa fa-user"></i>
              <p>
                Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/create_admin') }}" class="nav-link @yield('create_admin')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/user_manage') }} " class="nav-link @yield('user_manage')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @yield('admininformation')">
             <i class="fa fa-user"></i>
              <p>
                AdminInformation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('admin/create_information') }}" class="nav-link @yield('create_information')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/manage_information') }} " class="nav-link @yield('manage_information')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Information</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @yield('journal_type')">
             <i class="fa fa-user"></i>
              <p>
                Journal Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('admin/create_journal_type') }}" class="nav-link @yield('create_journal_type')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Journal Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/manage_journal_type') }} " class="nav-link @yield('manage_journal_type')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Journal Type</p>
                </a>
              </li>
             
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link @yield('journal')">
             <i class="fa fa-user"></i>
              <p>
                Journal 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('admin/create_journal') }}" class="nav-link @yield('create_journal')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Journal </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/manage_journal') }} " class="nav-link @yield('manage_journal')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Journal</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @yield('comment')">
             <i class="fa fa-user"></i>
              <p>
                Comment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('admin/comment_manage') }}" class="nav-link @yield('manage_comment')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Comment </p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @yield('contact')">
             <i class="fa fa-user"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('admin/contact_manage') }}" class="nav-link @yield('manage_contact')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Contact </p>
                </a>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    @elseif (auth()->user()->is_reviewer == 1)
    <!-- Sidebar reviewer -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->reviewer_info )
          <img src="{{asset('assets/reviewer_profile/'.auth()->user()->reviewer_info->image)}}" class="img-circle elevation-2" alt="User Image">
            
          @else
            <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ url('reviewer/profile_page') }}" class="d-block">{{ auth()->user()->user_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('Profile')">
               <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('reviewer/profile_page') }}" class="nav-link @yield('profile_page')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p> Show Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('reviewer/create_profile') }}" class="nav-link @yield('create_profile')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p> Create Profile</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ url('reviewer/manage_profile') }}" class="nav-link @yield('manage_profile')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p> Manag Profile</p>
                </a>
              </li>
              </li>
            </ul>
          </li>

        
           <li class="nav-item">
            <a href="#" class="nav-link @yield('journal')">
             <i class="fa fa-user"></i>
              <p>
                Journal 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('reviewer/create_journal') }}" class="nav-link @yield('create_journal')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Journal </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('reviewer/manage_journal') }} " class="nav-link @yield('manage_journal')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Journal</p>
                </a>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
      @elseif (auth()->user()->is_auth == 1)
    <!-- Sidebar auth -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->auth_info )
          <img src="{{asset('assets/auth_profile/'.auth()->user()->auth_info->image)}}" class="img-circle elevation-2" alt="User Image">
            
          @else
            <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ url('auth/show_profile') }}" class="d-block">{{ auth()->user()->user_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link @yield('Profile')">
               <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('auth/show_profile') }}" class="nav-link @yield('profile_page')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p> Show Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('auth/create_profile') }}" class="nav-link @yield('create_profile')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p> Create Profile</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ url('auth/manage_profile') }}" class="nav-link @yield('manage_profile')")>
                  <i class="far fa-circle nav-icon"></i>
                  <p> Manag Profile</p>
                </a>
              </li>
              </li>
            </ul>
          </li>

        
           <li class="nav-item">
            <a href="#" class="nav-link @yield('journal')">
             <i class="fa fa-user"></i>
              <p>
                Journal 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ url('auth/create_journal') }}" class="nav-link @yield('create_journal')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Journal </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('auth/manage_journal') }} " class="nav-link @yield('manage_journal')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Journal</p>
                </a>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    @endif
  
  </aside>
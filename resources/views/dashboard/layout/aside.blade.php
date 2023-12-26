<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
      <img src="{{ asset('images/logoo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ App\Models\Setting::first()->title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/home" class="nav-link {{ (request()->is('admin/home')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Providers
               <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: {{ (request()->is('admin/providers')) ? 'block' : 'none' }};">
              <li class="nav-item">
                <a href="{{ route('admin.providers')}}" class="nav-link {{ (request()->is('admin/providers')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    providers
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.providersRequest')}}" class="nav-link {{ (request()->is('admin/providersRequest')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Providers Requests
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.providersBlock')}}" class="nav-link {{ (request()->is('admin/providersBlock')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Providers Blocked
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/main_business" class="nav-link {{ (request()->is('admin/main_business')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Main Business
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/sub_business" class="nav-link {{ (request()->is('admin/sub_business')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sub Business
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/questions" class="nav-link {{ (request()->is('admin/questions')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Questions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/answers" class="nav-link {{ (request()->is('admin/answers')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Answers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Setting
               <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('admin.setting')}}" class="nav-link {{ (request()->is('admin/setting')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Setting
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.aboutUs')}}" class="nav-link {{ (request()->is('admin/aboutUs')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    About
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.notifications')}}" class="nav-link {{ (request()->is('admin/notifications')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Notifications
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.reviews')}}" class="nav-link {{ (request()->is('admin/reviews')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Review
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.privacy')}}" class="nav-link {{ (request()->is('admin/privacy')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Privacy & Term
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
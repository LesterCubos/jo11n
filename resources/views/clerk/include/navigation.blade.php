    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ route('clerk.dashboard') }}" style="margin-top: 15px"><img src="{{ asset('img/J11White.png') }}" alt="logo" style="width: 200px; height: 70px"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('clerk.dashboard') }}"><img src="{{ asset('img/J11logo.png') }}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #202130; color: #00fefc">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item d-none d-lg-block">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="search" style="background-color: #202130; border-color: #202130; font-size: 16px; color: white; font-weight: bold">
                    <i class="bx bx-calendar-event" style="margin-right: 5px; color: #4d4dff; font-size: 20px"></i>
                    <?php  date_default_timezone_set('Asia/Manila');
                        echo date("l, m-d-Y. h:i a");?>
                  </span>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-flex mr-4 ">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="icon-cog" style="color: #00fefc"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                <a class="dropdown-item preview-item" href="{{ route('profile.edit') }}">
                  <i class="icon-head" style="color: #000080; font-weight: 700"></i> Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
      
                  <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                    <i class="ri-logout-circle-r-line" style="color: #000080; font-weight: 700"></i> Logout
                  </a>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
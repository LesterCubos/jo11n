<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @if (\Route::current()->getName() == 'profile.edit')
    <div style="margin-top: 100px"></div>
  @else
    <div class="user-profile">
      <div class="user-image">
        @if (empty(Auth::user()->avatar))
          <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
        @else
          <img src="/avatars/{{ Auth::user()->avatar }}" alt="Profile Photo">
        @endif
      </div>
      <div class="user-name">
        <a>
          {{ Auth::user()->name }}
        </a>
      </div>
    </div>
  @endif
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
        <i class="icon-box menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('superadmin.manage_users.index') }}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Manage Users</span>
      </a>
    </li>
  </ul>
</nav>

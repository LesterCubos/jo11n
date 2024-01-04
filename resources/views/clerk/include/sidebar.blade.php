<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @if (\Route::current()->getName() == 'clerk.profile.edit')
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
      <div class="user-name" style="font-size: 18px">
        <a>
          {{ Auth::user()->name }}
        </a>
      </div>
      <div class="user-designation">
        {{ Auth::user()->department }}
      </div>
    </div>
  @endif
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('clerk.dashboard') }}">
        <i class="bi bi-columns-gap menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('clerk.stocks') }}">
        <i class="bi bi-box-seam menu-icon"></i>
        <span class="menu-title">Stocks</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="bx bxs-message-add menu-icon"></i>
        <span class="menu-title">Request</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="bi bi-clipboard-data menu-icon"></i>
        <span class="menu-title">Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="bi bi-receipt-cutoff menu-icon"></i>
        <span class="menu-title">Receipts</span>
      </a>
    </li>
  </ul>
</nav>

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @if (\Route::current()->getName() == 'admin.profile.edit')
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
        {{ Auth::user()->role }}
      </div>
    </div>
  @endif
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-columns-gap menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.stocks') }}">
        <i class="bi bi-box-seam menu-icon"></i>
        <span class="menu-title">Stocks</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('orders.index') }}">
        <i class="bi bi-cart-check menu-icon"></i>
        <span class="menu-title">Order</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('suppliers.index') }}">
        <i class="bx bx-store menu-icon"></i>
        <span class="menu-title">Supplier</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="bi bi-clipboard-data menu-icon"></i>
        <span class="menu-title">Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="ri-arrow-left-right-line menu-icon"></i>
        <span class="menu-title">Transaction</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.manage_users.index') }}">
        <i class="bi bi-people menu-icon"></i>
        <span class="menu-title">Manage Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ri-upload-cloud-2-line menu-icon"></i>
        <span class="menu-title">Backup</span>
      </a>
    </li>
  </ul>
</nav>

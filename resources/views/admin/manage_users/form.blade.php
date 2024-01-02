@extends('admin.layouts.app')
@section('title','Add New User')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active">Add New User</li>
    </ol>
    </nav>
  </div><!-- End Page name -->
  
  @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
  @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px">
            <div class="card-body">
              <form class="forms-sample" method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Input Name" required>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="department">Department</label>
                  <select id="department" name="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}" required>
                      <option value="Grocery Department" {{ old('department') == 'Grocery Department' ? 'selected' : '' }}>Grocery Department</option>
                      <option value="Apparel Department" {{ old('department') == 'Apparel Department' ? 'selected' : '' }}>Apparel Department</option>
                      <option value="Home Goods Department" {{ old('department') == 'Home Goods Department' ? 'selected' : '' }}>Home Goods Department</option>
                      <option value="Inventory Manager" {{ old('department') == 'Inventory Manager' ? 'selected' : '' }}>Inventory Manager</option>
                  </select>
                  @error('department')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="contact_number">Contact Number</label>
                  <input type="number" class="form-control  @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" placeholder="Input Contact Number" required>
                  @error('contact_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="role">Role</label>
                  <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>
                      <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                      <option value="clerk" {{ old('role') == 'clerk' ? 'selected' : '' }}>clerk</option>
                  </select>
                  @error('role')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button type="submit" class="btn btn-info mr-2">Submit</button>
                    <a href="{{ route('admin.manage_users.index')}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
              <br>
                
            </div>
        </div>
    </div>
</div>
@endsection
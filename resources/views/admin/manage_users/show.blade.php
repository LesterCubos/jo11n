@extends('admin.layouts.app')
@section('title','View User')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active">View User</li>
    </ol>
    </nav>
  </div><!-- End Page name -->

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card" style="border-radius: 10px">
            <div class="card-body">
              <h4 class="card-title">Status</h4>
              <p class="card-description">
                Active / Inactive
              </p>
              @livewire('user-status', ['model' => $user, 'field' => 'isActive'], key($user->id))
              <br>
              <h4 class="card-title">Basic Information</h4>
              <p class="card-description">
                {{-- Basic form layout --}}
              </p>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="{{ $user->name }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" placeholder="{{ $user->email }}" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" id="email" placeholder="{{ $user->department }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" placeholder="{{ $user->contact_number }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" placeholder="{{ $user->role }}" readonly="readonly">
                </div>
                <a href="{{ route('admin.manage_users.index')}}" class="btn btn-dark btn-lg btn-block" style="margin-top: 50px;">Back</a>
              </form>
            </div>
          </div>
        </div>
    
</div>
@endsection
@extends('admin.layouts.app')

@section('title','Users List')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Manage Users</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage User</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Users</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->
  <div style="margin-top: 50px">
      @if(session('notif.success'))
        <div class="alert alert-success fade in alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button>    
            <strong>{{ session('notif.success') }}</strong>
        </div>
      @endif

      @if(session('notif.danger'))
        <div class="alert alert-danger fade in alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button>    
            <strong>{{ session('notif.danger') }}</strong>
        </div>
      @endif
  </div>

  @livewire('user-search')

</div>

@endsection

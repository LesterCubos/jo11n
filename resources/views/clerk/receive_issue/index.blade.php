@extends('clerk.layouts.app')

@section('title','Recieve and Issue Log')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Manage Receive and Issue Stock</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Stock Management</li>
        <li class="breadcrumb-item active" style="font-weight: 700">RECEIVE and ISSUE LOG</li>
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
  
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px; background-color: #2e9cca;">
      <div class="card-body">
        <form class="form-sample text-center">
            <a class="btn btn-info btn-icon-text" href="{{ route('clerk.stocks') }}" style="margin-left: 20px; margin-right: 100px"><i class="icon-arrow-left btn-icon-prepend" style="font-size: 18px"></i>Go Back</a>
            <a class="btn btn-warning btn-icon-text" href="{{ route('receives.create') }}" style="margin-left: 20px; margin-right: 100px"><i class="icon-arrow-down btn-icon-prepend" style="font-size: 18px"></i>Recieve Stocks</a>
            <a class="btn btn-primary btn-icon-text" href="{{ route('issues.create') }}" style="margin-left: 20px; margin-right: 100px"><i class="icon-arrow-up btn-icon-prepend" style="font-size: 18px"></i>Issue Stocks</a>
        </form>
      </div>
    </div>
  </div>

  @livewire('c-receive-issue-search')

</div>

@endsection

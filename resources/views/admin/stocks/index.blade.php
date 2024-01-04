@extends('admin.layouts.app')

@section('title','Stocks List')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Stock Management</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Stock Management</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Stocks</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->

    @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
    @endif

    @if(session('notif.danger'))
        <div class="alert alert-danger">
            {{ session('notif.danger') }} 
        </div>
    @endif
  
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px; background-color: #2e9cca;">
      <div class="card-body">
        <form class="form-sample text-center">
            <a class="btn btn-info btn-icon-text" href="{{ route('categories.index') }}" style="margin-left: 20px; margin-right: 100px"><i class="bi bi-plus-circle-fill btn-icon-prepend" style="font-size: 18px"></i>Add Category</a>
            <a class="btn btn-danger btn-icon-text" href="{{ route('expiry.index') }}" style="margin-left: 20px; margin-right: 100px"><i class="bi bi-clock-fill btn-icon-prepend" style="font-size: 18px"></i>Expiration Status</a>
            <a class="btn btn-success btn-icon-text" href="{{ route('products.index') }}" style="margin-left: 20px; margin-right: 100px"><i class="bi bi-bag-fill btn-icon-prepend" style="font-size: 18px"></i>Products</a>
            <a class="btn btn-warning btn-icon-text" href="{{ route('receives.index') }}" style="margin-left: 20px; margin-right: 100px"><i class="ri-arrow-up-down-fill btn-icon-prepend" style="font-size: 18px"></i>Receive/Issues</a>
            <a class="btn btn-dark btn-icon-text" href="{{ route('Stockexport') }}" style="margin-left: 20px; margin-right: 20px"><i class="bx bx-export btn-icon-prepend" style="font-size: 18px"></i>Export</a>
        </form>
      </div>
    </div>
  </div>

  @livewire('stock-search')

</div>

@endsection

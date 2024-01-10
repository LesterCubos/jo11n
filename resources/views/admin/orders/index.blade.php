@extends('admin.layouts.app')

@section('title','Orders Management')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Order Management</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Order Management</li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Orders</li>
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
            <a class="btn btn-info btn-icon-text" href="{{ route('reorder.index') }}" style="margin-left: 20px; margin-right: 100px"><i class="bi bi-box-seam btn-icon-prepend" style="font-size: 18px"></i>Re-Order</a>
            <a class="btn btn-warning btn-icon-text" href="{{ route('orders.create') }}" style="margin-left: 20px; margin-right: 100px"><i class="bi bi-plus-circle-fill btn-icon-prepend" style="font-size: 18px"></i>New Order</a>
            <a class="btn btn-success btn-icon-text" href="{{ route('products.index') }}" style="margin-left: 20px; margin-right: 100px"><i class="bi bi-clipboard-check btn-icon-prepend" style="font-size: 18px"></i>Request</a>
        </form>
      </div>
    </div>
  </div>

  @livewire('order-search')

</div>

@endsection

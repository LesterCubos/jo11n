@extends('clerk.layouts.app')

@section('title','Transactions List')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Manage Transaction</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('clerk.stocks') }}">Transaction Management</a></li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Transactions</li>
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

    @livewire('receipt-search')

</div>

@endsection

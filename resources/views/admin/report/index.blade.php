@extends('admin.layouts.app')

@section('title','Different Reports')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Report Management</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" style="font-weight: 700">Report Management</li>
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
    <div class="card" style="border-radius: 10px;">
        <div class="card-body">
            <h4 class="card-title" style="font-size: 20px">Reports management</h4>
            <p class="card-description" style="font-size: 16px">
            View Diffrent <code>Reports</code>
            </p>

            <a href="{{ route('reports.index') }}" class="btn btn-warning col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                VIEW CLERK REPORTS <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
            </a>
            @if ($stocks->isNotEmpty())
                <a href="{{ route('insumrep.index') }}" class="btn btn-primary col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    INVENTORY SUMMARY REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
                <a href="{{ route('reorrep.index') }}" class="btn btn-info col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    REORDER REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
                <a href="{{ route('orrep.index') }}" class="btn btn-success col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    ORDER REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
                <a href="{{ route('isrep.index') }}" class="btn btn-secondary col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    ISSUE REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
                <a href="{{ route('insumrep.index') }}" class="btn btn-dark col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    REQUEST REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
                <a href="{{ route('insumrep.index') }}" class="btn btn-danger col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    EXPIRY REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
                <a href="{{ route('insumrep.index') }}" class="btn btn-light col-lg-12 d-flex align-items-center justify-content-between" style="text-align: left; font-weight: bolder; letter-spacing: 1px; margin-bottom: 10px">
                    RECEIPT REPORT <i class="bi bi-chevron-double-right" style="font-size: 20px;font-width: bold;"></i>
                </a>
            @endif
        </div>
    </div>
  </div>

</div>

@endsection

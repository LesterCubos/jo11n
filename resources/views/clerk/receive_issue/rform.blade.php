@extends('clerk.layouts.app')
@section('title','Add New Receive Stock')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage Receive Stocks</li>
        <li class="breadcrumb-item active">Add Receive Stocks</li>
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
              <form class="forms-sample"method="POST" action="{{ route('receives.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        @livewire('c-search-s-k-u')
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{ route('receives.index') }}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
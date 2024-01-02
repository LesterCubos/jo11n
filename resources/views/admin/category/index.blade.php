@extends('admin.layouts.app')

@section('title','Categories List')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagetitle">
    <h1 style="font-weight: bolder">Manage Categories</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
            <i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.stocks') }}">Stock Management</a></li>
        <li class="breadcrumb-item active" style="font-weight: 700">List of Categories</li>
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

    <a href="{{ route('admin.stocks') }}" class="btn btn-primary btn-icon-text" style="margin-bottom: 20px">
        <i class="icon-arrow-left btn-icon-prepend"></i>
        Go Back
    </a>


    <div class="row">
        @livewire('category-search')
        <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card"  style="border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title mb-3">Category {{ isset($category) ? 'Edit' : 'Add' }}</h4>
                <form method="post" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    @isset($category)
                        @method('put')
                    @endisset
                    <br>
                    <div class="form-group">
                        <label for="name">Department:</label>
                        <select class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ $category->department ?? old('department') }}">
                            <option value="" disabled selected>{{ $category->department ?? old('department') }}</option>
                            <option value="Grocery Department" {{ old('department') == 'Grocery Department' ? 'selected' : '' }}>Grocery Department</option>
                            <option value="Apparel Department" {{ old('department') == 'Apparel Department' ? 'selected' : '' }}>Apparel Department</option>
                            <option value="Home Goods Department" {{ old('department') == 'Home Goods Department' ? 'selected' : '' }}>Home Goods Department</option>
                        </select>
                        @error('product_category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_category">Product Category:</label>
                        <input type="text" name="product_category" id="product_category" class="form-control @error('product_category') is-invalid @enderror" value="{{ $category->product_category ?? old('product_category') }}">
                        @error('product_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplier_name">Supplier Name:</label>
                        <select class="form-control @error('supplier_name') is-invalid @enderror" id="supplier_name" name="supplier_name" value="{{ $category->supplier_name ?? old('supplier_name') }}">
                            <option value="" disabled selected>{{ $category->supplier_name ?? old('supplier_name') }}</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->supplier_name }}" {{ old('supplier_name') == $supplier->supplier_name ? 'selected' : '' }}>{{ $supplier->supplier_name }}</option>
                            @endforeach 
                        </select>
                        @error('supplier_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
    
                    <div class="flex text-center" style="padding-top: 10px">
                        <button class="btn btn-success ">{{ __('Save') }}</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>

</div>

@endsection

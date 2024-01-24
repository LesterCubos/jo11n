@extends('admin.layouts.app')
@section('title','Add New Order Form')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Request Order Management</li>
        <li class="breadcrumb-item active">Order Form</li>
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
              <form class="forms-sample"method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center" style="margin-bottom: 10px">
                                <h5 style="color: #000; font-weight: bold">Order Form</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SKU</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control  @error('orsku') is-invalid @enderror" id="orsku" name="orsku" value="{{ $req->product_sku }}" required  readonly>
                                        @error('orsku')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Supplier Name</label>
                                    <div class="col-sm-9">
                                        @foreach ($categories as $category)
                                            @if ($category->product_category == $product->product_category)
                                                @php( $orsupname = $category->supplier_name )
                                            @endif
                                        @endforeach
                                        <input type="text" class="form-control  @error('orsupname') is-invalid @enderror" id="orsupname" name="orsupname" value="{{ $orsupname }}" required readonly>
                                    @error('orsupname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contact Info</label>
                                    <div class="col-sm-9">
                                            @foreach ($suppliers as $supplier)
                                                @if ($orsupname == $supplier->supplier_name)
                                                    @php( $orsupnumber = $supplier->supplier_number )
                                                @endif
                                            @endforeach
                                            <input type="number" class="form-control @error('orsupnumber') is-invalid @enderror" id="orsupnumber" name="orsupnumber" value="{{ $orsupnumber }}" readonly>
                                        @error('orsupnumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date </label>
                                <div class="col-sm-9">
                                    <input type="date" name="ordate" id="ordate" class="form-control @error('ordate') is-invalid @enderror" value="{{ $currentDate }}" readonly>
                                    @error('ordate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror    
                                </div>
                            </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">UPC</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('pupc') is-invalid @enderror" id="pupc" name="pupc" value="{{ old('pupc') }}" readonly>
                                        @error('pupc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control  @error('orpname') is-invalid @enderror" id="orpname" name="orpname" value="{{ $req->product_name }}" required readonly>
                                    @error('orpname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Category</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control  @error('orpcat') is-invalid @enderror" id="orpcat" name="orpcat" value="{{ $req->product_category }}" required readonly>
                                    @error('orpcat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control  @error('orpdept') is-invalid @enderror" id="orpdept" name="orpdept" value="{{ $req->department }}" required readonly>
                                    @error('orpdept')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Minimum Stock</label>
                                    <div class="col-sm-9">
                                            <input type="number" class="form-control @error('orpmins') is-invalid @enderror" id="orpmins" name="orpmins" value="{{ $product->min_stock }}" readonly>
                                        @error('orpmins')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Stock</label>
                                    <div class="col-sm-9">
                                            <input type="number" class="form-control @error('orpcurs') is-invalid @enderror" id="orpcurs" name="orpcurs" value="{{ $stock->stock_quantity }}" readonly>
                                        @error('orpcurs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('orstatus') is-invalid @enderror" id="orstatus" name="orstatus" value="{{ old('orstatus') }}" required>
                                        @error('orstatus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="/admin/request{{$req->id}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
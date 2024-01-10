@extends('admin.layouts.app')
@section('title','Reorder Form')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Order Management</li>
        <li class="breadcrumb-item active">Reorder Form</li>
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
                                <h5 style="color: #000; font-weight: bold">Reorder Form</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SKU</label>
                                    <div class="col-sm-9">
                                      <div class="search-box">
                                          <input type="text" class="form-control  @error('orsku') is-invalid @enderror" id="orsku" name="orsku" value="{{ $reorder->product_sku }}" required readonly placeholder="Search SKU" >
                                      </div>
                                        @error('orsku')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Supplier Name</label>
                                    <div class="col-sm-9">
                                      @if(empty($skuDetails))
                                        <input type="text" class="form-control  @error('orsupname') is-invalid @enderror" id="orsupname" name="orsupname" value="" required readonly>
                                      @else
                                        @foreach ($categories as $category)
                                            @if ($category->product_category == $skuDetails->product_category)
                                                @php( $orsupname = $category->supplier_name )
                                            @endif
                                        @endforeach
                                          <input type="text" class="form-control  @error('orsupname') is-invalid @enderror" id="orsupname" name="orsupname" value="{{ $orsupname }}" required readonly>
                                      @endif
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
                                        @if(empty($skuDetails))
                                            <input type="number" class="form-control @error('orsupnumber') is-invalid @enderror" id="orsupnumber" name="orsupnumber" value="{{ old('orsupnumber') }}" readonly>
                                        @else
                                            @foreach ($suppliers as $supplier)
                                                @if ($orsupname == $supplier->supplier_name)
                                                    @php( $orsupnumber = $supplier->supplier_number )
                                                @endif
                                            @endforeach
                                            <input type="number" class="form-control @error('orsupnumber') is-invalid @enderror" id="orsupnumber" name="orsupnumber" value="{{ $orsupnumber }}" readonly>
                                          @endif
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
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    @if(empty($skuDetails))
                                        <input type="text" class="form-control  @error('orpname') is-invalid @enderror" id="orpname" name="orpname" value="" required readonly>
                                    @else
                                        <input type="text" class="form-control  @error('orpname') is-invalid @enderror" id="orpname" name="orpname" value="{{ $skuDetails->product_name }}" required readonly>
                                    @endif
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
                                      @if(empty($skuDetails))
                                        <input type="text" class="form-control  @error('orpcat') is-invalid @enderror" id="orpcat" name="orpcat" value="" required readonly>
                                      @else
                                        <input type="text" class="form-control  @error('orpcat') is-invalid @enderror" id="orpcat" name="orpcat" value="{{ $skuDetails->product_category }}" required readonly>
                                      @endif
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
                                      @if(empty($skuDetails))
                                        <input type="text" class="form-control  @error('orpdept') is-invalid @enderror" id="orpdept" name="orpdept" value="" required readonly>
                                      @else
                                        @foreach ($categories as $category)
                                            @if ($category->product_category == $skuDetails->product_category)
                                                @php( $department = $category->department )
                                            @endif
                                        @endforeach
                                          <input type="text" class="form-control  @error('orpdept') is-invalid @enderror" id="orpdept" name="orpdept" value="{{ $department }}" required readonly>
                                      @endif
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
                                        @if(empty($skuDetails))
                                            <input type="number" class="form-control @error('orpmins') is-invalid @enderror" id="orpmins" name="orpmins" value="{{ old('orpmins') }}" readonly>
                                        @else
                                            <input type="number" class="form-control @error('orpmins') is-invalid @enderror" id="orpmins" name="orpmins" value="{{ $skuDetails->min_stock }}" readonly>
                                        @endif
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
                                        @if(empty($skuDetails))
                                            <input type="number" class="form-control @error('orpcurs') is-invalid @enderror" id="orpcurs" name="orpcurs" value="{{ old('orpcurs') }}" readonly>
                                        @else
                                            <input type="number" class="form-control @error('orpcurs') is-invalid @enderror" id="orpcurs" name="orpcurs" value="{{ $stock->stock_quantity }}" readonly>
                                        @endif
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
                            </div> --}}
                        </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{ route('noticereorder.index') }}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
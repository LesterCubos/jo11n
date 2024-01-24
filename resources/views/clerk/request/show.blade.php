@extends('clerk.layouts.app')
@section('title','Request Form')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Request Management</li>
        <li class="breadcrumb-item active">Request Form</li>
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
              <form class="forms-sample"method="POST" action="" enctype="multipart/form-data">

                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center" style="margin-bottom: 10px">
                                <h5 style="color: #000; font-weight: bold">Request Form</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Date </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="request_date" id="request_date" class="form-control" value="{{ $req->request_date }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Requester Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="requester_name" name="requester_name" value="{{ $req->requester_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Requester Email</label>
                                    <div class="col-sm-9">
                                    <input type="email" class="form-control" id="requester_email" name="requester_email" value="{{ $req->requester_email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Department</label>
                                  <div class="col-sm-9">
                                        <input type="text" class="form-control" id="department" name="department" value="{{ $req->department }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SKU</label>
                                    <div class="col-sm-9">
                                      <div class="search-box">
                                          <input type="text" class="form-control" id="product_sku" name="product_sku" value="{{ $req->product_sku }}" readonly>
                                      </div>
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
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $req->product_name }}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Product Category</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product_category" name="product_category" value="{{ $req->product_category }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="requested_quantity" name="requested_quantity" value="{{ $req->requested_quantity }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Purpose</label>
                                  <textarea  name="request_purpose" id="request_purpose" class="form-control" rows="7" readonly>{{ $req->request_purpose }}</textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <a href="{{ route('crequests.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
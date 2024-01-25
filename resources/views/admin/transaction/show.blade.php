@extends('admin.layouts.app')
@section('title','Transaction Form')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Transaction Management</li>
        <li class="breadcrumb-item active">Transaction Form</li>
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
                                <h5 style="color: #000; font-weight: bold">Transaction Form</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Transaction No</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="transNo" id="transNo" class="form-control" value="{{ $tran->transNo }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Date </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="{{ $tran->transaction_date }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SKU</label>
                                    <div class="col-sm-9">
                                      <div class="search-box">
                                          <input type="text" class="form-control" id="product_sku" name="product_sku" value="{{ $tran->product_sku }}" readonly>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $tran->product_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Transactioner Email</label>
                                    <div class="col-sm-9">
                                    <input type="email" class="form-control" id="Transactioner_email" name="Transactioner_email" value="{{ $tran->Transactioner_email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Product Category</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product_category" name="product_category" value="{{ $tran->product_category }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Department</label>
                                  <div class="col-sm-9">
                                        <input type="text" class="form-control" id="department" name="department" value="{{ $tran->department }}" readonly>
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
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="transaction_quantity" name="transaction_quantity" value="{{ $tran->transaction_quantity }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Cost</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="total_stock_cost" name="total_stock_cost" value="{{ $tran->total_stock_cost }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Notes</label>
                                  <textarea  name="transaction_notes" id="transaction_notes" class="form-control" rows="7" readonly>{{ $tran->transaction_notes }}</textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <a href="{{ route('transactions.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
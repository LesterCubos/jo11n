@extends('clerk.layouts.app')
@section('title','Show Stocks')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Stock Management</li>
        <li class="breadcrumb-item active">{{ $stock->product_name }} Stock</li>
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
              <form class="forms-sample">
                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center" style="margin-bottom: 10px">
                               <h5 style="color: #000; font-weight: bold">{{ $stock->product_name }} STOCK</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Stock SKU</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" value="{{ $stock->stock_sku }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stock Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $stock->product_name }}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Stock Category</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $stock->stock_category }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Department</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $stock->dept }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $stock->stock_quantity }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Purchase Cost</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $stock->purchase_cost }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Stock Cost</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $stock->total_stock_cost }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Selling Cost</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $stock->selling_cost }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Stock Value</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $stock->total_stock_value }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Availability</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ $stock->availability }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Availability Stock</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $stock->availability_stock }}" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <a href="{{ route('clerk.stocks')}}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
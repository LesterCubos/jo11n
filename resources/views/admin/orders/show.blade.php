@extends('admin.layouts.app')
@section('title','Add New Order Form')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Order Management</li>
        @if ($order->ortype == 'ORDER')
            <li class="breadcrumb-item active">Show Order</li>
        @else 
            <li class="breadcrumb-item active">Show Re-Order</li>
        @endif
        
    </ol>
    </nav>
  </div><!-- End Page name -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px">
            <div class="card-body">
              <form class="forms-sample" method="POST" enctype="multipart/form-data">

                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center" style="margin-bottom: 10px">
                                @if ($order->ortype == 'ORDER')
                                    <h5 style="color: #000; font-weight: bold">Order Form</h5>
                                @else 
                                    <h5 style="color: #000; font-weight: bold">Re-Order Form</h5>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SKU</label>
                                    <div class="col-sm-9">
                                      <div class="search-box">
                                          <input type="text" class="form-control" id="orsku" name="orsku" value="{{ $order->orsku }}" readonly>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Supplier Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="orsupname" name="orsupname" value="{{ $order->orsupname }}"readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contact Info</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="orsupnumber" name="orsupnumber" value="{{ $order->orsupnumber }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date </label>
                                  <div class="col-sm-9">
                                      <input type="date" name="ordate" id="ordate" class="form-control" value="{{ $order->ordate }}" readonly>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">UPC</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pupc" name="pupc" value="{{ $order->pupc }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="orpname" name="orpname" value="{{ $order->orpname }}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Product Category</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="orpcat" name="orpcat" value="{{ $order->orpcat }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Department</label>
                                  <div class="col-sm-9">
                                        <input type="text" class="form-control" id="orpdept" name="orpdept" value="{{ $order->orpdept }}" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Minimum Stock</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="orpmins" name="orpmins" value="{{ $order->orpmins }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Stock</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="orpcurs" name="orpcurs" value="{{ $order->orpcurs }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="orstatus" name="orstatus" value="{{ $order->orstatus }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    @if ($order->ortype == 'ORDER')
                        <a href="{{ route('orders.index') }}" class="btn btn-warning">Back</a>
                    @else 
                        <a href="{{ route('reorder.index') }}" class="btn btn-warning">Back</a>
                    @endif
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
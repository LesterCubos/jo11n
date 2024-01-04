@extends('admin.layouts.app')
    @if ($ri->movement == 'RECEIVED')
        @php($title = 'Show Receive Stocks')
    @else
        @php($title = 'Show Issue Stocks')
    @endif
@section('title', $title)
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ ('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Stock Management</li>
        @if ($ri->movement == 'RECEIVED')
            <li class="breadcrumb-item active">Show Receive Stocks</li>
        @else
            <li class="breadcrumb-item active">Show Issue Stocks</li>
        @endif
    </ol>
    </nav>
  </div><!-- End Page name -->
  
  @if(session('notif.success'))
        <div class="alert alert-danger">
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
                                @if ($ri->movement == 'RECEIVED')
                                    <h5 style="color: #000; font-weight: bold">RECEIVED STOCK</h5>
                                @else
                                    <h5 style="color: #000; font-weight: bold">ISSUE STOCK</h5>
                                @endif
                            </div>
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stock Movement Reference Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('smrn') is-invalid @enderror" id="smrn" name="smrn" value="{{ $ri->smrn }}" required readonly>
                                    @error('smrn')
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
                                      <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ $ri->date }}" readonly>
                                      @error('date')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror    
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">SKU</label>
                                  <div class="col-sm-9">
                                        <input type="text" class="form-control  @error('psku') is-invalid @enderror" id="psku" name="psku" value="{{ $ri->psku }}" required readonly>
                                      @error('psku')
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
                                        <input type="text" class="form-control @error('pupc') is-invalid @enderror" id="pupc" name="pupc" value="{{ $ri->pupc }}" readonly>
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
                                        <input type="text" class="form-control  @error('pname') is-invalid @enderror" id="pname" name="pname" value="{{ $ri->pname }}" required readonly>
                                    @error('pname')
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
                                        <input type="text" class="form-control  @error('pcategory') is-invalid @enderror" id="pcategory" name="pcategory" value="{{ $ri->pcategory }}" required readonly>
                                      @error('pcategory')
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
                                          <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="{{ $ri->department }}" required readonly>
                                      @error('department')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Supplier</label>
                                  <div class="col-sm-9">
                                          <input type="text" class="form-control  @error('sname') is-invalid @enderror" id="sname" name="sname" value="{{ $ri->sname }}" required readonly>
                                      @error('sname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            @if ($ri->movement == 'RECEIVED')
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Purchase Cost</label>
                                        <div class="col-sm-9">
                                                <input type="number" class="form-control @error('purchase_cost') is-invalid @enderror" id="purchase_cost" name="purchase_cost" value="{{ $ri->purchase_cost }}" step="0.01" readonly>
                                            @error('purchase_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Selling Cost</label>
                                        <div class="col-sm-9">
                                                <input type="number" class="form-control @error('selling_cost') is-invalid @enderror" id="selling_cost" name="selling_cost" value="{{ $ri->selling_cost }}" step="0.01" readonly>
                                            @error('selling_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $ri->quantity }}" readonly>
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($ri->movement == 'RECEIVED')
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry Date </label>
                                        <div class="col-sm-9">
                                            <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ $ri->expiry_date }}" readonly>
                                            @error('expiry_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror    
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Notes</label>
                                  <textarea  name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" value="" rows="7" readonly>{{ $ri->notes }}</textarea>
                                  @error('notes')
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
                <div class="flex text-center" style="padding-top: 10px">
                    <a href="{{ route('receives.index') }}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
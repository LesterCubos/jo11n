@extends('clerk.layouts.app')
@section('title','Show Remove Expired Product')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Expiration Management</li>
        <li class="breadcrumb-item active">Show Remove Stock</li>
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
                               <h5 style="color: #000; font-weight: bold">REMOVE STOCK</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Stock Movement Reference Number</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control  @error('rsmrn') is-invalid @enderror" id="rsmrn" name="rsmrn" value="{{ $remove->rsmrn }}" required readonly>
                                      @error('rsmrn')
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
                                      <input type="date" name="curdate" id="curdate" class="form-control @error('curdate') is-invalid @enderror" value="{{ $remove->curdate }}" readonly>
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
                                <label class="col-sm-3 col-form-label" style="color: red; font-weight: bolder">Expiration Date </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="expdate" id="expdate" class="form-control @error('expdate') is-invalid @enderror" value="{{ $remove->expdate }}" readonly>
                                        @error('expdate')
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
                                    <input type="text" class="form-control  @error('rsku') is-invalid @enderror" id="rsku" name="rsku" value="{{ $remove->rsku }}" required readonly>
                                      @error('rsku')
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
                                    <input type="text" class="form-control  @error('rname') is-invalid @enderror" id="rname" name="rname" value="{{ $remove->rname }}" required readonly>
                                    @error('rname')
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
                                    <input type="text" class="form-control  @error('rcat') is-invalid @enderror" id="rcat" name="rcat" value="{{ $remove->rcat }}" required readonly>
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
                                    <input type="text" class="form-control  @error('rdept') is-invalid @enderror" id="rdept" name="rdept" value="{{ $remove->rdept }}" required readonly>
                                      @error('rdept')
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
                                        <input type="number" class="form-control @error('rquantity') is-invalid @enderror" id="rquantity" name="rquantity" value="{{ $remove->rquantity }}" required readonly>
                                        @error('rquantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Notes</label>
                                  <textarea  name="rnotes" id="rnotes" class="form-control @error('rnotes') is-invalid @enderror" value="" rows="7" readonly>{{ $remove->rnotes }}</textarea>
                                  @error('rnotes')
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
                    <a href="{{ route('cremoves.index')}}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>


@endsection
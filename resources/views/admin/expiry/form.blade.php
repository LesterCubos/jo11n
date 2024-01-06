@extends('admin.layouts.app')
@section('title','Remove Expired Product')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Expiration Management</li>
        <li class="breadcrumb-item active">Remove Stock</li>
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
              <form class="forms-sample" method="POST" action="{{ route('removes.store') }}" enctype="multipart/form-data">
                @csrf

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
                                      <input type="text" class="form-control  @error('rsmrn') is-invalid @enderror" id="rsmrn" name="rsmrn" value="{{ $receive->smrn }}" required readonly>
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
                                      <input type="date" name="curdate" id="curdate" class="form-control @error('curdate') is-invalid @enderror" value="{{ $currentDate }}" readonly>
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
                                        <input type="date" name="expdate" id="expdate" class="form-control @error('expdate') is-invalid @enderror" value="{{ $receive->expiry_date }}" readonly>
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
                                    <input type="text" class="form-control  @error('rsku') is-invalid @enderror" id="rsku" name="rsku" value="{{ $receive->psku }}" required readonly>
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
                                    <input type="text" class="form-control  @error('rname') is-invalid @enderror" id="rname" name="rname" value="{{ $receive->pname }}" required readonly>
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
                                    <input type="text" class="form-control  @error('rcat') is-invalid @enderror" id="rcat" name="rcat" value="{{ $receive->pcategory }}" required readonly>
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
                                    <input type="text" class="form-control  @error('rdept') is-invalid @enderror" id="rdept" name="rdept" value="{{ $receive->department }}" required readonly>
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
                                      @if ($receive->issuequan == NULL)
                                        <input type="number" class="form-control @error('rquantity') is-invalid @enderror" id="rquantity" name="rquantity" value="{{ $receive->quantity }}" required readonly>
                                      @else
                                        <input type="number" class="form-control @error('rquantity') is-invalid @enderror" id="rquantity" name="rquantity" value="{{ $receive->issuequan }}" required readonly>
                                      @endif 
                                        
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
                                  <textarea  name="rnotes" id="rnotes" class="form-control @error('rnotes') is-invalid @enderror" value="{{ old('rnotes') }}" rows="7"></textarea>
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
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{ route('expiry.index')}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<script>
    // create onchange event listener for featured_poster input
    document.getElementById('product_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an poster, create a preview in featured_poster_preview
            document.getElementById('product_image_preview').src = URL.createObjectURL(file)
        }
    }
  
</script>

@endsection
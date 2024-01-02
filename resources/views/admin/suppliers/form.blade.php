@extends('admin.layouts.app')
@section('title','Add New Supplier')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage Suppliers</li>
        <li class="breadcrumb-item active">Add New Supplier</li>
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
              <form class="forms-sample"method="POST" action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" enctype="multipart/form-data">
                @csrf

                @isset($supplier)
                    @method('put')
                @endisset

                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="mt-2">
                                    <input type="file" id="supplier_image" name="supplier_image" class="btn block w-full text-sm text-slate-500" style="width: 500px"/>
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <div class="shrink-0 my-2">
                                    <img id="supplier_image_preview" class="h-20 w-50 object-cover rounded-md" src="{{ isset($supplier) ? Storage::url($supplier->supplier_image) : '' }}" alt="Image preview" style="margin-left: 100px"/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Supplier Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('supplier_name') is-invalid @enderror" id="supplier_name" name="supplier_name" value="{{ $supplier->supplier_name ?? old('supplier_name') }}" required>
                                    @error('supplier_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('supplier_email') is-invalid @enderror" id="supplier_email" name="supplier_email" value="{{ $supplier->supplier_email ?? old('supplier_email') }}" required>
                                        @error('supplier_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Key Person Name </label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control @error('supplier_kpn') is-invalid @enderror" id="supplier_kpn" name="supplier_kpn" value="{{ $supplier->supplier_kpn ?? old('supplier_kpn') }}" required>
                                      @error('supplier_kpn')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="supplier_address" id="supplier_address" class="form-control @error('supplier_address') is-invalid @enderror" value="{{ $supplier->supplier_address ?? old('supplier_address') }}" required>
                                        @error('supplier_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror    
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Contact Number </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control  @error('supplier_number') is-invalid @enderror" id="supplier_number" name="supplier_number" value="{{ $supplier->supplier_number ?? old('supplier_number') }}" required>
                                    @error('supplier_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Emergency Contact</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('emergency_contact') is-invalid @enderror" id="emergency_contact" name="emergency_contact" value="{{ $supplier->emergency_contact ?? old('emergency_contact') }}" required>
                                        @error('emergency_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Emergency Contact Number</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('econtact_number') is-invalid @enderror" id="econtact_number" name="econtact_number" value="{{ $supplier->econtact_number ?? old('econtact_number') }}" required>
                                    @error('econtact_number')
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
                    <a href="{{ route('suppliers.index')}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<script>
    // create onchange event listener for featured_poster input
    document.getElementById('supplier_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an poster, create a preview in featured_poster_preview
            document.getElementById('supplier_image_preview').src = URL.createObjectURL(file)
        }
    }
  
</script>

@endsection
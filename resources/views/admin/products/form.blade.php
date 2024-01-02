@extends('admin.layouts.app')
@section('title','Add New Product')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage Products</li>
        <li class="breadcrumb-item active">Add New Product</li>
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
              <form class="forms-sample"method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="mt-2">
                                    <input type="file" id="product_image" name="product_image" class="btn block w-full text-sm text-slate-500" style="width: 500px"/>
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <div class="shrink-0 my-2">
                                    <img id="product_image_preview" class="h-20 w-50 object-cover rounded-md" src="{{ isset($product) ? Storage::url($product->product_image) : ''}}" alt="Image preview"/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                                    @error('product_name')
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
                                        <input type="text" class="form-control @error('product_upc') is-invalid @enderror" id="product_upc" name="product_upc" value="{{ $product->product_upc }}">
                                        @error('product_upc')
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
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('product_category') is-invalid @enderror" id="product_category" name="product_category" value="{{ $product->product_category }}" required>
                                          @foreach ($categories as $category)
                                            <option value="{{ $category->product_category }}" {{ $product->product_category == $category->product_category ? 'selected' : '' }}>{{ $category->product_category }}</option>
                                          @endforeach 
                                        </select>
                                        @error('product_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Size/Weight </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('product_weight') is-invalid @enderror" id="product_weight" name="product_weight" value="{{ $product->product_weight }}">
                                    @error('product_weight')
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
                                    <label class="col-sm-3 col-form-label">Product Variants</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('product_variant') is-invalid @enderror" id="product_variant" name="product_variant" value="{{ $product->product_variant }}">
                                        @error('product_variant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Packaging</label>
                                  <div class="col-sm-9">
                                    <select class="form-control @error('packaging_type') is-invalid @enderror" name="packaging_type" id="packaging_type" value="{{ $product->packaging_type }}">
                                      <option value="" {{ $product->packaging_type == '' ? 'selected' : '' }}></option>
                                      <option value="Sachet" {{ $product->packaging_type == 'Sachet' ? 'selected' : '' }}>Sachet</option>
                                      <option value="Can" {{ $product->packaging_type == 'Can' ? 'selected' : '' }}>Can</option>
                                      <option value="Bottle" {{ $product->packaging_type == 'Bottle' ? 'selected' : '' }}>Bottle</option>
                                    </select>
                                    @error('packaging_type')
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
                                    <label class="col-sm-3 col-form-label">Minimum Stock Level</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('min_stock') is-invalid @enderror" id="min_stock" name="min_stock" value="{{ $product->min_stock }}" required>
                                        @error('min_stock')
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
                    <a href="{{ route('products.index')}}" class="btn btn-warning">Cancel</a>
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
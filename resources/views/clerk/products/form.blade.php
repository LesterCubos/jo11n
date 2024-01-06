@extends('admin.layouts.app')
@section('title','Add New Product')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage Products</li>
        <li class="breadcrumb-item active">{{ $product->product_name }}</li>
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
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="shrink-0 my-2" style="display: flex; justify-content: center; align-items: center;">
                                    <img id="product_image_preview" class="" src="{{ Storage::url($product->product_image) }}" alt="Image preview"/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $product->product_name }}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">UPC</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ $product->product_upc }}" readonly>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ $product->product_category }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Size / Weight </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $product->product_weight }}" readonly>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Variants</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ $product->product_variant }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Packaging</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $product->packaging_type }}" readonly>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Minimum Stock Level</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{ $product->min_stock }}" readonly>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <a href="{{ route('clerk.products')}}" class="btn btn-warning">Back</a>
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
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Products Table</h4>
        <!-- Button trigger modal -->
        <button id="icon_add" type="button" class="btn btn-success btn-icon-text" data-toggle="modal" data-target="#confirm-product-add">
            <i class="bi bi-bag-check-fill btn-icon-prepend"></i>Add New product
        </button>

        <!-- Modal -->
        <div class="modal fade" id="confirm-product-add" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">{{ __('New Product') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                  @csrf
              <div class="modal-body">
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
                                      <img id="product_image_preview" class="h-20 w-50 object-cover rounded-md" src="" alt="Image preview" style="margin-left: 100px"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Product Name</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control  @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
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
                                          <input type="text" class="form-control @error('product_upc') is-invalid @enderror" id="product_upc" name="product_upc" value="{{ old('product_upc') }}" readonly>
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
                                          <select class="form-control @error('product_category') is-invalid @enderror" id="product_category" name="product_category" value="{{ old('product_category') }}" required>
                                            <option value="" disabled selected></option>
                                            @foreach ($categories as $category)
                                              <option value="{{ $category->product_category }}" {{ old('product_category') == $category->product_category ? 'selected' : '' }}>{{ $category->product_category }}</option>
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
                                      <input type="text" class="form-control @error('product_weight') is-invalid @enderror" id="product_weight" name="product_weight" value="{{ old('product_weight') }}">
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
                                          <input type="text" class="form-control @error('product_variant') is-invalid @enderror" id="product_variant" name="product_variant" value="{{ old('product_variant') }}">
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
                                      <select class="form-control @error('packaging_type') is-invalid @enderror" name="packaching_type" id="packaging_type">
                                        <option value="" {{ old('packaging_type') == '' ? 'selected' : '' }}></option>
                                        <option value="Sachet" {{ old('packaging_type') == 'Sachet' ? 'selected' : '' }}>Sachet</option>
                                        <option value="Can" {{ old('packaging_type') == 'Can' ? 'selected' : '' }}>Can</option>
                                        <option value="Bottle" {{ old('packaging_type') == 'Bottle' ? 'selected' : '' }}>Bottle</option>
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
                                          <input type="number" class="form-control @error('min_stock') is-invalid @enderror" id="min_stock" name="min_stock" value="{{ old('min_stock') }}" required>
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
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
              </div>
              </form>
              </div>
          </div>
        </div>

        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Products..." wire:model.lazy="searchProduct">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>PREVIEW</th>
                <th>PRODUCT NAME</th>
                <th>SKU</th>
                <th>CATEGORY</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $product)
                <tr>
                  <td><div class="product-item"><img src="{{ Storage::url($product->product_image) }}" alt=""></div></td>
                  <td>{{ $product->product_name}}</td>
                  <td>{{ $product->product_sku}}</td>
                  <td>{{ $product->product_category}}</td>
                  <td> 

                    <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('products.edit', $product->id) }}"><i class="icon-open"></i></a>
                    
                    <!-- Button trigger modal -->
                    <button id="icon_delete{{$product->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-product-deletion{{$product->id}}">
                        <i class="icon-trash"></i>
                    </button>

                      <!-- Modal -->
                      <div class="modal fade" id="confirm-product-deletion{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this account?') }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                              @csrf
                              @method('delete')

                            <div class="modal-body">
                              <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once this account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this account.') }}
                              </p>
                              <br>
                              <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-color:black">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Product Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $products->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

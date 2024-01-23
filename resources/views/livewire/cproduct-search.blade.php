<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Products Table</h4>

        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Products..." wire:model.lazy="searchCproduct">
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
                    <a href="/clerk/products{{$product->id}}" class="btn btn-info"><i class="icon-eye"></i></a>
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

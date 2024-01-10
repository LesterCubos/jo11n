<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title" style="font-size: 20px">STOCKS NEAR MINIMUM STOCK LEVEL</h4>
        {{-- <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search STOCK SKU..." wire:model.lazy="searchreorder">
        </div> --}}
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder; font-size: 16px"> 
              <tr>
                <th>SKU</th>
                <th>PRODUCT NAME</th>
                <th>MINIMUM STOCK</th>
                <th>CURRENT STOCK</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($reorders as $reorder)
                <tr>
                  <td>{{ $reorder->stock_sku }}</td>
                  <td>{{ $reorder->product_name }}</td>
                  <td>
                    @foreach ($products as $product) 
                        @if ($product->product_sku == $reorder->stock_sku) 
                            {{ $product->min_stock }}
                        @endif
                    @endforeach
                  </td>
                  <td>{{ $reorder->stock_quantity }}</td>
                  <td> 
                    <a href="{{ route('orders.edit', $reorder->stock_sku) }}" class="btn btn-info"><i class="bi bi-box-seam"></i></a> 
                  </td>
                </tr>
             @empty
                <tr>
                    <td colspan="11" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Reorder Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $reorders->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

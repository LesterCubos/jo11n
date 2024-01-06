<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title" style="font-size: 20px">Stocks Table</h4>
        <p class="card-description">
            List of <code>STOCKS</code>
          </p>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Product Name..." wire:model.lazy="searchCstock">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder; font-size: 16px"> 
              <tr>
                <th>SKU</th>
                <th>CATEGORY</th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>PURCHASE COST</th>
                <th>TOTAL STOCK COST</th>
                <th>SELLING COST</th>
                <th>TOTAL STOCK VALUE</th>
                <th>AVAILABILITY</th>
                <th>AVAILABLE STOCK</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($stocks as $stock)
                <tr>
                  <td>{{ $stock->stock_sku }}</td>
                  <td>{{ $stock->stock_category }}</td>
                  <td>{{ $stock->product_name }}</td>
                  <td>{{ $stock->stock_quantity }}</td>
                  <td>{{ $stock->purchase_cost }}</td>
                  <td>{{ $stock->total_stock_cost }}</td>
                  <td>{{ $stock->selling_cost }}</td>
                  <td>{{ $stock->total_stock_value }}</td>
                  <td>{{ $stock->availability }}</td>
                  <td>{{ $stock->availability_stock }}</td>
                  <td> 
                    <a href="/clerk/stocks{{$stock->id}}" class="btn btn-info"><i class="icon-eye"></i></a> 
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Stock Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $stocks->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

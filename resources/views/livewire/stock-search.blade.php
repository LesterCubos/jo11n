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
            <input type="text" class="form-control" placeholder="Search Product Name..." wire:model.lazy="searchStock">
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
                    
                      <a href="/admin/stocks{{$stock->id}}" class="btn btn-info"><i class="icon-eye"></i></a> 
  

                      {{-- @if ($stock->role == "admin")
                        <button id="icon_delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-stock-deletion" disabled>
                          <i class="icon-trash"></i>
                        </button>
                      @else
                        <!-- Button trigger modal -->
                        <button id="icon_delete{{$stock->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-stock-deletion{{$stock->id}}">
                          <i class="icon-trash"></i>
                        </button>
                      @endif

                      <!-- Modal -->
                      <div class="modal fade" id="confirm-stock-deletion{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this account?') }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="{{ route('stock.destroy', $stock->id) }}">
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
                      </div> --}}
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

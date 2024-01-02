<div class="row">
    <!-- CSS -->
    <style type="text/css">
    .search-box .clear{
        clear:both;
        margin-top: 20px;
    }

    .search-box ul{
        list-style: none;
        padding: 0px;
        position: absolute;
        margin: 0;
        background: white;
    }

    .search-box ul li{
        background: lavender;
        padding: 4px;
        margin-bottom: 1px;
    }

    .search-box ul li:nth-child(even){
        background: purple;
        color: white;
    }

    .search-box ul li:hover{
        cursor: pointer;
    }

    .search-box input[type=text]{
        letter-spacing: 1px;
    }
    </style>

    <div class="row">
        <div class="col-md-12 text-center" style="margin-bottom: 10px">
          <h5 style="color: #000; font-weight: bold">RECEIVE STOCK</h5>
        </div>
        <div class="col-md-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stock Movement Reference Number</label>
            <div class="col-sm-9">
                <input type="text" class="form-control  @error('smrn') is-invalid @enderror" id="smrn" name="smrn" value="{{ $smrn }}" required readonly>
                @error('smrn')
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
                  <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ $currentDate }}" readonly>
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
              <label class="col-sm-3 col-form-label">SKU</label>
              <div class="col-sm-9">
                <div class="search-box">
                    <input type="text" class="form-control  @error('psku') is-invalid @enderror" id="psku" name="psku" value="{{ old('psku') }}" required  wire:model="skuSearch" wire:keyup="searchResult" placeholder="Search SKU" >
            
                    <!-- Search result list -->
                    @if($showdiv)
                        <ul>
                            @if(!empty($records))
                                @foreach($records as $record)
            
                                     <li wire:click="fetchskuDetail({{ $record->id }})">{{ $record->product_sku}}</li>
            
                                @endforeach
                            @endif
                        </ul>
                    @endif
                </div>
                  @error('psku')
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
                    <input type="text" class="form-control @error('pupc') is-invalid @enderror" id="pupc" name="pupc" value="{{ old('pupc') }}" readonly>
                    @error('pupc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Product Name</label>
            <div class="col-sm-9">
                @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('pname') is-invalid @enderror" id="pname" name="pname" value="" required readonly>
                @else
                    <input type="text" class="form-control  @error('pname') is-invalid @enderror" id="pname" name="pname" value="{{ $skuDetails->product_name }}" required readonly>
                @endif
                @error('pname')
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
                  @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('pcategory') is-invalid @enderror" id="pcategory" name="pcategory" value="" required readonly>
                  @else
                    <input type="text" class="form-control  @error('pcategory') is-invalid @enderror" id="pcategory" name="pcategory" value="{{ $skuDetails->product_category }}" required readonly>
                  @endif
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
                  @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="" required readonly>
                  @else
                    @foreach ($categories as $category)
                        @if ($category->product_category == $skuDetails->product_category)
                            @php( $department = $category->department )
                        @endif
                    @endforeach
                      <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="{{ $department }}" required readonly>
                  @endif
                  @error('department')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Supplier</label>
              <div class="col-sm-9">
                  @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('sname') is-invalid @enderror" id="sname" name="sname" value="" required readonly>
                  @else
                    @foreach ($categories as $category)
                        @if ($category->product_category == $skuDetails->product_category)
                            @php( $sname = $category->supplier_name )
                        @endif
                    @endforeach
                      <input type="text" class="form-control  @error('sname') is-invalid @enderror" id="sname" name="sname" value="{{ $sname }}" required readonly>
                  @endif
                  @error('sname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
        </div>
        @if ($route == 'RECEIVE')
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Purchase Cost</label>
                    <div class="col-sm-9">
                        @if(empty($skuDetails))
                            <input type="number" class="form-control @error('purchase_cost') is-invalid @enderror" id="purchase_cost" name="purchase_cost" value="{{ old('purchase_cost') }}" step="0.01">
                        @else
                            <input type="number" class="form-control @error('purchase_cost') is-invalid @enderror" id="purchase_cost" name="purchase_cost" value="{{ $stock->purchase_cost }}" step="0.01">
                        @endif
                        @error('purchase_cost')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Selling Cost</label>
                    <div class="col-sm-9">
                        @if(empty($skuDetails))
                            <input type="number" class="form-control @error('selling_cost') is-invalid @enderror" id="selling_cost" name="selling_cost" value="{{ old('selling_cost') }}" step="0.01">
                        @else
                            <input type="number" class="form-control @error('selling_cost') is-invalid @enderror" id="selling_cost" name="selling_cost" value="{{ $stock->selling_cost }}" step="0.01">
                        @endif
                        @error('selling_cost')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        @if ($route == 'RECEIVE')
            <div class="col-md-6">
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Expiry Date </label>
                    <div class="col-sm-9">
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date') }}">
                        @error('expiry_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror    
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Notes</label>
              <textarea  name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" value="{{ old('notes') }}" rows="7"></textarea>
              @error('notes')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            
            </div>
          </div>
      </div>

</div>
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
            <h5 style="color: #000; font-weight: bold">Order Form</h5>
        </div>
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">SKU</label>
                <div class="col-sm-9">
                  <div class="search-box">
                      <input type="text" class="form-control  @error('orsku') is-invalid @enderror" id="orsku" name="orsku" value="{{ old('orsku') }}" required  wire:model="oskuSearch" wire:keyup="searchResult" placeholder="Search SKU" >
              
                      <!-- Search result list -->
                      @if($showdiv)
                          <ul style="z-index: 1000;">
                              @if(!empty($records))
                                  @foreach($records as $record)
              
                                       <li wire:click="fetchskuDetail({{ $record->id }})">{{ $record->product_sku}}</li>
              
                                  @endforeach
                              @endif
                          </ul>
                      @endif
                  </div>
                    @error('orsku')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Supplier Name</label>
                <div class="col-sm-9">
                  @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('orsupname') is-invalid @enderror" id="orsupname" name="orsupname" value="" required readonly>
                  @else
                    @foreach ($categories as $category)
                        @if ($category->product_category == $skuDetails->product_category)
                            @php( $orsupname = $category->supplier_name )
                        @endif
                    @endforeach
                      <input type="text" class="form-control  @error('orsupname') is-invalid @enderror" id="orsupname" name="orsupname" value="{{ $orsupname }}" required readonly>
                  @endif
                  @error('orsupname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Contact Info</label>
                <div class="col-sm-9">
                    @if(empty($skuDetails))
                        <input type="number" class="form-control @error('orsupnumber') is-invalid @enderror" id="orsupnumber" name="orsupnumber" value="{{ old('orsupnumber') }}" readonly>
                    @else
                        @foreach ($suppliers as $supplier)
                            @if ($orsupname == $supplier->supplier_name)
                                @php( $orsupnumber = $supplier->supplier_number )
                            @endif
                        @endforeach
                        <input type="number" class="form-control @error('orsupnumber') is-invalid @enderror" id="orsupnumber" name="orsupnumber" value="{{ $orsupnumber }}" readonly>
                      @endif
                    @error('orsupnumber')
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
                  <input type="date" name="ordate" id="ordate" class="form-control @error('ordate') is-invalid @enderror" value="{{ $currentDate }}" readonly>
                  @error('ordate')
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
                    <input type="text" class="form-control  @error('orpname') is-invalid @enderror" id="orpname" name="orpname" value="" required readonly>
                @else
                    <input type="text" class="form-control  @error('orpname') is-invalid @enderror" id="orpname" name="orpname" value="{{ $skuDetails->product_name }}" required readonly>
                @endif
                @error('orpname')
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
                    <input type="text" class="form-control  @error('orpcat') is-invalid @enderror" id="orpcat" name="orpcat" value="" required readonly>
                  @else
                    <input type="text" class="form-control  @error('orpcat') is-invalid @enderror" id="orpcat" name="orpcat" value="{{ $skuDetails->product_category }}" required readonly>
                  @endif
                  @error('orpcat')
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
                    <input type="text" class="form-control  @error('orpdept') is-invalid @enderror" id="orpdept" name="orpdept" value="" required readonly>
                  @else
                    @foreach ($categories as $category)
                        @if ($category->product_category == $skuDetails->product_category)
                            @php( $department = $category->department )
                        @endif
                    @endforeach
                      <input type="text" class="form-control  @error('orpdept') is-invalid @enderror" id="orpdept" name="orpdept" value="{{ $department }}" required readonly>
                  @endif
                  @error('orpdept')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Minimum Stock</label>
                <div class="col-sm-9">
                    @if(empty($skuDetails))
                        <input type="number" class="form-control @error('orpmins') is-invalid @enderror" id="orpmins" name="orpmins" value="{{ old('orpmins') }}" readonly>
                    @else
                        <input type="number" class="form-control @error('orpmins') is-invalid @enderror" id="orpmins" name="orpmins" value="{{ $skuDetails->min_stock }}" readonly>
                    @endif
                    @error('orpmins')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Current Stock</label>
                <div class="col-sm-9">
                    @if(empty($skuDetails))
                        <input type="number" class="form-control @error('orpcurs') is-invalid @enderror" id="orpcurs" name="orpcurs" value="{{ old('orpcurs') }}" readonly>
                    @else
                        <input type="number" class="form-control @error('orpcurs') is-invalid @enderror" id="orpcurs" name="orpcurs" value="{{ $stock->stock_quantity }}" readonly>
                    @endif
                    @error('orpcurs')
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
                    <input type="number" class="form-control @error('orstatus') is-invalid @enderror" id="orstatus" name="orstatus" value="{{ old('orstatus') }}" required>
                    @error('orstatus')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

</div>
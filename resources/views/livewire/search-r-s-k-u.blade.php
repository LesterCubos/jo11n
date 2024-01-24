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
            <h5 style="color: #000; font-weight: bold">Request Form</h5>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Date </label>
                <div class="col-sm-9">
                    <input type="date" name="request_date" id="request_date" class="form-control @error('request_date') is-invalid @enderror" value="{{ $currentDate }}" readonly>
                    @error('request_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Requester Name</label>
                <div class="col-sm-9">
                <input type="text" class="form-control  @error('requester_name') is-invalid @enderror" id="requester_name" name="requester_name" value="{{ $username }}" required readonly>
                  @error('requester_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Requester Email</label>
                <div class="col-sm-9">
                <input type="email" class="form-control  @error('requester_email') is-invalid @enderror" id="requester_email" name="requester_email" value="{{ $useremail }}" required readonly>
                  @error('requester_email')
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
                    <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="{{ $userdept }}" required readonly>
                  @error('department')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">SKU</label>
                <div class="col-sm-9">
                  <div class="search-box">
                      <input type="text" class="form-control  @error('product_sku') is-invalid @enderror" id="product_sku" name="product_sku" value="{{ old('product_sku') }}" required  wire:model="rskuSearch" wire:keyup="searchResult" placeholder="Search SKU" >
              
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
                    @error('product_sku')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
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
        </div> --}}
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Product Name</label>
            <div class="col-sm-9">
                @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="" required readonly>
                @else
                    <input type="text" class="form-control  @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ $skuDetails->product_name }}" required readonly>
                @endif
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
              <label class="col-sm-3 col-form-label">Product Category</label>
              <div class="col-sm-9">
                  @if(empty($skuDetails))
                    <input type="text" class="form-control  @error('product_category') is-invalid @enderror" id="product_category" name="product_category" value="" required readonly>
                  @else
                    <input type="text" class="form-control  @error('product_category') is-invalid @enderror" id="product_category" name="product_category" value="{{ $skuDetails->product_category }}" required readonly>
                  @endif
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
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control @error('requested_quantity') is-invalid @enderror" id="requested_quantity" name="requested_quantity" value="{{ old('requested_quantity') }}" required>
                    @error('requested_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Purpose</label>
              <textarea  name="request_purpose" id="request_purpose" class="form-control @error('request_purpose') is-invalid @enderror" value="{{ old('request_purpose') }}" rows="7"></textarea>
              @error('request_purpose')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            
            </div>
        </div>
    </div>

</div>
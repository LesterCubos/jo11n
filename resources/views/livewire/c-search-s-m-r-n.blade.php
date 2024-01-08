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
            <h5 style="color: #000; font-weight: bold">ISSUE STOCK</h5>
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
              <label class="col-sm-3 col-form-label">Issue SMRN</label>
              <div class="col-sm-9">
                <div class="search-box">
                    <input type="text" class="form-control  @error('issuesmrn') is-invalid @enderror" id="issuesmrn" name="issuesmrn" value="{{ old('issuesmrn') }}" required  wire:model="smrnCsearch" wire:keyup="searchResult" placeholder="Search SMRN" >
            
                    <!-- Search result list -->
                    @if($showdiv)
                        <ul style="z-index: 1000;">
                            @if(!empty($records))
                                @foreach($records as $record)
            
                                    <li wire:click="fetchsmrnDetail({{ $record->id }})">{{ $record->smrn}}</li>
            
                                @endforeach
                            @endif
                        </ul>
                    @endif
                </div>
                  @error('issuesmrn')
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
                    @if(empty($smrnDetails))
                        <input type="text" class="form-control  @error('psku') is-invalid @enderror" id="psku" name="psku" required readonly>
                    @else
                        <input type="text" class="form-control  @error('psku') is-invalid @enderror" id="psku" name="psku" value="{{ $smrnDetails->psku }}" required readonly>
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
                @if(empty($smrnDetails))
                    <input type="text" class="form-control  @error('pname') is-invalid @enderror" id="pname" name="pname" value="" required readonly>
                @else
                    <input type="text" class="form-control  @error('pname') is-invalid @enderror" id="pname" name="pname" value="{{ $smrnDetails->pname }}" required readonly>
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
                  @if(empty($smrnDetails))
                    <input type="text" class="form-control  @error('pcategory') is-invalid @enderror" id="pcategory" name="pcategory" value="" required readonly>
                  @else
                    <input type="text" class="form-control  @error('pcategory') is-invalid @enderror" id="pcategory" name="pcategory" value="{{ $smrnDetails->pcategory }}" required readonly>
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
                  @if(empty($smrnDetails))
                    <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="" required readonly>
                  @else
                      <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="{{ $smrnDetails->department }}" required readonly>
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
                  @if(empty($smrnDetails))
                    <input type="text" class="form-control  @error('sname') is-invalid @enderror" id="sname" name="sname" value="" required readonly>
                  @else
                      <input type="text" class="form-control  @error('sname') is-invalid @enderror" id="sname" name="sname" value="{{ $smrnDetails->sname }}" required readonly>
                  @endif
                  @error('sname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Purchase Cost</label>
                <div class="col-sm-9">
                    @if(empty($smrnDetails))
                        <input type="number" class="form-control @error('purchase_cost') is-invalid @enderror" id="purchase_cost" name="purchase_cost" value="" step="0.01" required readonly>
                    @else
                        <input type="number" class="form-control @error('purchase_cost') is-invalid @enderror" id="purchase_cost" name="purchase_cost" value="{{ $smrnDetails->purchase_cost }}" step="0.01" required readonly>
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
                    @if(empty($smrnDetails))
                        <input type="number" class="form-control @error('selling_cost') is-invalid @enderror" id="selling_cost" name="selling_cost" value="" step="0.01" required readonly>
                    @else
                        <input type="number" class="form-control @error('selling_cost') is-invalid @enderror" id="selling_cost" name="selling_cost" value="{{ $smrnDetails->selling_cost }}" step="0.01" required readonly>
                    @endif
                    @error('selling_cost')
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
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Expiry Date </label>
                <div class="col-sm-9">
                    @if(empty($smrnDetails))
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="" required readonly>
                    @else
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ $smrnDetails->expiry_date }}" required readonly>
                    @endif
                    @error('expiry_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror    
                </div>
            </div>
        </div>
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
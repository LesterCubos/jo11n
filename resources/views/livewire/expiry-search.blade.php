<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">List of Expired Products</h4>
        <a href="{{ route('removes.index')}}" class="btn btn-danger btn-icon-text">
          <i class="bi bi-trash-fill btn-icon-prepend"></i>Remove Stocks
        </a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Product SKU..." wire:model.lazy="searchExpiry">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>STOCK MOVEMENT REFERENCE NO.</th>
                <th>SKU</th>
                <th>PRODUCT NAME</th>
                <th>EXPIRY DATE</th>
                <th>QUANTITY</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($expiries as $expiry)
                <tr>
                  <td>{{ $expiry->smrn }}</td>
                  <td>{{ $expiry->psku }}</td>
                  <td>{{ $expiry->pname }}</td>
                  <td>{{ $expiry->expiry_date }}</td>
                  <td>
                    @if ($expiry->issuequan == NULL)
                      {{ $expiry->quantity }}
                    @else
                      {{ $expiry->issuequan }}
                    @endif 
                  </td>
                  <td> 
                    @if ($expiry->revstock == 1)
                      <a class="btn btn-primary btn-fw disabled" id="icon_edit" href="{{ route('receives.edit', $expiry->id) }}"><i class="icon-open"></i></a>
                    @else
                      <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('receives.edit', $expiry->id) }}"><i class="icon-open"></i></a>
                    @endif
                  </td>
                </tr>
              @empty
                  <tr>
                      <td colspan="6" style="text-align: center; font-size: 24px">
                          <div class="py-5" style="">No Expiring Products Found...</div>
                      </td>  
                  </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $expiries->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

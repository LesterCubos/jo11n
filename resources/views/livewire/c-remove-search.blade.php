<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">List of Remove Stocks</h4>

        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Remove Stocks..." wire:model.lazy="searchCremove">
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
              @forelse ($removes as $remove)
                <tr>
                  <td>{{ $remove->rsmrn }}</td>
                  <td>{{ $remove->rsku }}</td>
                  <td>{{ $remove->rname }}</td>
                  <td>{{ $remove->expdate }}</td>
                  <td>{{ $remove->rquantity }}</td>
                  <td> 
                    <a class="btn btn-success btn-fw" id="icon_edit" href="/clerk/remove{{$remove->id}}"><i class="bi bi-eye-fill"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Remove Stocks Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $removes->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

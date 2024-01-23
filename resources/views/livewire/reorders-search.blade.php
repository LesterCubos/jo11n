<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="breorder-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">List of reorders</h4>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Re-Order Stocks..." wire:model.lazy="searchReor">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>TRANSACTION ORDER NO.</th>
                <th>DATE</th>
                <th>SKU</th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($reorders as $reorder)
                <tr>
                  <td>{{ $reorder->tron }}</td>
                  <td>{{ $reorder->ordate }}</td>
                  <td>{{ $reorder->orsku }}</td>
                  <td>{{ $reorder->orpname }}</td>
                  <td>{{ $reorder->orstatus }}</td>
                  <td> 
                    @if ($reorder->revstock == 1)
                      <a class="btn btn-primary btn-fw disabled" id="icon_edit" href="{{ route('receives.edit', $reorder->id) }}"><i class="icon-open"></i></a>
                    @else
                      <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('receives.edit', $reorder->id) }}"><i class="icon-open"></i></a>
                    @endif
                  </td>
                </tr>
              @empty
                  <tr>
                      <td colspan="6" style="text-align: center; font-size: 24px">
                          <div class="py-5" style="">No Reorders Found...</div>
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

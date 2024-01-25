<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Transactions Table</h4>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Transactions..." wire:model.lazy="searchTrans">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>TRANSACTION NO</th>
                <th>SKU</th>
                <th>PRODUCT NAME</th>
                <th>CATEGORY</th>
                <th>DEPARTMENT</th>
                <th>TRANSACTION TYPE</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($trans as $tran)
                <tr>
                  <td>
                    {{ $tran->transNo }}
                  </td>
                  <td>{{ $tran->product_sku}}</td>
                  <td>{{ $tran->product_name}}</td>
                  <td>{{ $tran->product_category}}</td>
                  <td>{{ $tran->department}}</td>
                  <td>
                    @if($tran->transaction_type == 'RECEIVED')
                      <label class="badge badge-info">RECEIVED</label>
                    @elseif($tran->transaction_type ==  'RELEASED')
                      <label class="badge badge-warning">RELEASED</label>
                    @elseif($tran->transaction_type ==  'REMOVED')
                      <label class="badge badge-danger">REMOVED</label>
                    @elseif($tran->transaction_type ==  'DISPOSED')
                      <label class="badge badge-primary">DISPOSED</label>
                    @endif
                  </td>
                  <td> 
                    <a href="/admin/transaction{{$tran->id}}" class="btn btn-info"><i class="icon-eye"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Transaction Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $trans->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title" style="font-size: 20px"> Stock Movement History Table</h4>
        <p class="card-description">
            List of <code>Receive and Issue Stocks</code>
          </p>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Product SKU..." wire:model.lazy="searchRecieveIssue">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder; font-size: 16px"> 
              <tr>
                <th>STOCK MOVEMENT REFERENCE NO.</th>
                <th>DATE</th>
                <th>SKU</th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>MOVEMENT</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($receiveissues as $receiveissue)
                <tr>
                  <td>{{ $receiveissue->smrn }}</td>
                  <td>{{ $receiveissue->date }}</td>
                  <td>{{ $receiveissue->psku }}</td>
                  <td>{{ $receiveissue->pname }}</td>
                  <td>{{ $receiveissue->quantity }}</td>
                  <td>
                    @if($receiveissue->movement == 'RECEIVED')
                      <label class="badge badge-warning">RECEIVED</label>
                    @elseif($receiveissue->movement ==  'ISSUED')
                      <label class="badge badge-primary">ISSUED</label>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-success btn-fw" id="icon_edit" href="/clerk/receiveissue{{$receiveissue->id}}"><i class="bi bi-eye-fill"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Receives and Issues Stock Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $receiveissues->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

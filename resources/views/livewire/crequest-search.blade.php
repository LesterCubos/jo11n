<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Requests Table</h4>
        <a href="{{ route('crequests.create')}}" class="btn btn-primary btn-icon-text">
            <i class="bx bxs-message-add btn-icon-prepend"></i>Add New Request
        </a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Requests..." wire:model.lazy="searchCrequest">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>REQUEST NO.</th>
                <th>DATE</th>
                <th>PRODUCT NAME</th>
                <th>SKU</th>
                <th>CATEGORY</th>
                <th>QUANTITY</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($reqs as $req)
                <tr>
                  <td>{{ $req->reqNo }}</td>
                  <td>{{ $req->request_date }}</td>
                  <td>{{ $req->product_name}}</td>
                  <td>{{ $req->product_sku}}</td>
                  <td>{{ $req->product_category}}</td>
                  <td>{{ $req->requested_quantity}}</td>
                  <td>
                    @if($req->status == 'Pending')
                      <label class="badge badge-info">Pending</label>
                    @elseif($req->status ==  'Processing')
                      <label class="badge badge-warning">Processing</label>
                    @elseif($req->status ==  'Completed')
                      <label class="badge badge-success">Completed</label>
                    @endif
                  </td>
                  <td> 
                    
                    <form method="post" action="{{ route('crequests.destroy', $req->id) }}">      
                      @csrf
                      @method('DELETE')
                      <a href="/clerk/request{{$req->id}}" class="btn btn-info"><i class="icon-eye"></i></a>
                      @if($req->status == 'Pending')
                        <button id="icon_delete" type="submit" class="btn btn-danger">
                          <i class="icon-trash"></i>
                        </button>
                      @elseif($req->status ==  'Processing' || $req->status ==  'Completed')
                        <button id="icon_delete" type="submit" class="btn btn-danger" disabled>
                          <i class="icon-trash"></i>
                        </button>
                      @endif
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Request Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $reqs->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

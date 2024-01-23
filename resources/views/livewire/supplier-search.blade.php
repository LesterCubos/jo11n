<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Suppliers Table</h4>
        <a href="{{ route('suppliers.create')}}" class="btn btn-primary btn-icon-text">
            <i class="bx bxs-store btn-icon-prepend"></i>Add New Supplier
        </a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Suppliers..." wire:model.lazy="searchSupplier">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>LOGO</th>
                <th>SUPPLIER ID</th>
                <th>SUPPLIER NAME</th>
                <th>EMAIL</th>
                <th>CONTACT NUMBER</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($suppliers as $supplier)
                <tr>
                  <td>
                    <div class="product-item"><img src="{{ Storage::url($supplier->supplier_image) }}" alt=""></div>
                  </td>
                  <td>{{ $supplier->supplier_kpn}}</td>
                  <td>{{ $supplier->supplier_name}}</td>
                  <td>{{ $supplier->supplier_email}}</td>
                  <td>{{ $supplier->supplier_number}}</td>
                  <td> 

                      <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('suppliers.edit', $supplier->id) }}"><i class="icon-open"></i></a>

                    <!-- Button trigger modal -->
                    <button id="icon_delete{{$supplier->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-supplier-deletion{{$supplier->id}}">
                        <i class="icon-trash"></i>
                    </button>

                      <!-- Modal -->
                      <div class="modal fade" id="confirm-supplier-deletion{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this account?') }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="{{ route('suppliers.destroy', $supplier->id) }}">
                              @csrf
                              @method('delete')

                            <div class="modal-body">
                              <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once this account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this account.') }}
                              </p>
                              <br>
                              <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-color:black">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Supplier Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $suppliers->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

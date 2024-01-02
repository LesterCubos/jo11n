<div class="col-xl-9 grid-margin-lg-0 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Product Categories</h4>
                <p class="card-description">
                    Add and Edit<code>Categories</code>
                </p>
            </div>
            <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Product Category..." wire:model.lazy="searchCategory">
            </div>
        </div>
          <div class="table-responsive mt-3">
            <table class="table table-header-bg">
              <thead>
                <tr>
                  <th>
                      ID
                  </th>
                  <th>
                      DEPARTMENT
                  </th>
                  <th>
                      CATEGORY
                  </th>
                  <th>
                    SUPPLIER
                  </th>
                  <th>
                      Action
                  </th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($categories as $category)
                      <tr>
                          <td>
                              {{ $category->id }}
                          </td>
                          <td>
                            @if ($category->department == "Grocery Department")
                                <i class="bx bxs-shopping-bag" style="margin-right: 5px; margin-top: 5px ;font-size: 18px; color: blue"></i>
                            @elseif ($category->department == "Apparel Department")
                                <i class="ri-shirt-fill" style="margin-right: 5px; font-size: 18px; color: blue; margin-top: 5px "></i>
                            @elseif ($category->department == "Home Goods Department")
                                <i class="bx bxs-home-smile" style="margin-right: 5px; font-size: 18px; color: blue; margin-top: 5px "></i>
                            @endif
                            {{ $category->department }}  
                          </td>
                          <td>
                              {{ $category->product_category }} 
                          </td>
                          <td>
                            {{ $category->supplier_name }} 
                          </td>
                          <td>
                              <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('categories.edit', $category->id) }}"><i class="icon-open"></i></a>
                              <!-- Button trigger modal -->
                              <button id="icon_delete{{ $category->id }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion{{ $category->id }}">
                                  <i class="icon-trash"></i>
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="confirm-user-deletion{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this Academic Year?') }}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      </div>
                                      <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                      @csrf
                                      @method('delete')

                                      <div class="modal-body">
                                      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                          {{ __('Once the Academic Year is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this Academic Year.') }}
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
                                      <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                      </div>
                                      </form>
                                  </div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5" style="text-align: center; font-size: 24px">
                              <div class="py-5" style="">No Data Found...</div>
                          </td>  
                      </tr> 
                  @endforelse
              </tbody>
            </table>
            <div class="d-flex justify-content-center" style="margin-top: 20px">
                {!! $categories->links() !!}
            </div>
          </div>
      </div>
    </div>
  </div>

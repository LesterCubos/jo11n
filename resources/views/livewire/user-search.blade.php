<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Users Table</h4>
        <a href="{{ route('admin.manage_users.form')}}" class="btn btn-primary btn-icon-text">
            <i class="bi bi-person-plus-fill btn-icon-prepend"></i>Add New User
        </a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Users..." wire:model.lazy="searchUser">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>AVATAR</th>
                <th>NAME</th>
                <th>DEPARTMENT</th>
                <th>CONTACT NUMBER</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td class="py-1">
                    @if (empty($user->avatar))
                      <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
                    @else
                      <img src="/avatars/{{ $user->avatar }}" alt="Profile Photo">
                    @endif
                  </td>
                  <td>{{ $user->name}}</td>
                  <td>{{ $user->department}}</td>
                  <td>{{ $user->contact_number}}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->role}}</td>
                  <td>
                    @if($user->isActive == 1)
                      <label class="badge badge-success">Active</label>
                    @elseif($user->isActive == 0)
                      <label class="badge badge-danger">Inactive</label>
                    @endif
                  </td>
                  <td> 
                    
                      <a href="/admin/users/userView{{$user->id}}" class="btn btn-info"><i class="icon-eye"></i></a> 
  

                      @if ($user->role == "admin")
                        <button id="icon_delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion" disabled>
                          <i class="icon-trash"></i>
                        </button>
                      @else
                        <!-- Button trigger modal -->
                        <button id="icon_delete{{$user->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion{{$user->id}}">
                          <i class="icon-trash"></i>
                        </button>
                      @endif

                      <!-- Modal -->
                      <div class="modal fade" id="confirm-user-deletion{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this account?') }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
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
                        <div class="py-5" style="">No User Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $users->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

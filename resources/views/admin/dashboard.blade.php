{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('admin.layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center">
        <h4 class="font-weight-bold text-dark ">Welcome to John 11 Store Inventory Management System</h4>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success fade in alert-dismissible show" role="alert" style="margin-top: 20px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true" style="font-size:20px">×</span>
         </button>    
         <strong>{{ session('success') }}</strong> {{ __('You are logged in as Admin!') }}
       </div>
    @endif

    @if ($countexp > 0)
      <div class="alert alert-danger fade in alert-dismissible show" role="alert" style="margin-top: 20px;">
        <i class="bi bi-exclamation-circle-fill"></i>
        <strong> {{ $countexp }}</strong> {{ __('Product(s) is about to expire/expired this week') }}
        <a class="btn btn-danger btn-icon-text" style="margin-left: 10px" href="{{ route('expiry.index') }}">
          Inspect
        </a> 
      </div>
    @endif

    @if ($countreorder > 0)
      <div class="alert alert-danger fade in alert-dismissible show" role="alert" style="margin-top: 20px;">
        <i class="bi bi-exclamation-circle-fill"></i>
        <strong> {{ $countreorder }}</strong> {{ __('Product(s) has reached the minimun stock level') }}
        <a class="btn btn-danger btn-icon-text" style="margin-left: 10px" href="{{ route('noticereorder.index') }}">
          Inspect
        </a> 
      </div>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card" style="margin-top: 30px; border-radius: 10px; background-color: #2e9cca">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="card-title" style="font-size: 20px">Overview</h4>
            {{-- <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle text-dark pt-0 pr-0" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px">
                  <i class="ri-filter-2-fill" style="font-size: 16px"></i> Week
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 23px, 0px);">
                  <h6 class="dropdown-header">Today</h6>
                  <h6 class="dropdown-header">This week</h6>
                  <h6 class="dropdown-header">This month</h6>
                </div>
            </div> --}}
          </div>
          <div class="row">
            <div class="row flex-grow">
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">TOTAL PRODUCTS</h4>
                          <p>Total Number of Products</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-cart-alt" style="font-size: 20px"></i> {{ $tcountp }}</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">STOCK IN</h4>
                          <p>Total Stock In</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-upvote" style="font-size: 20px"></i> {{ $tcountsi }}</h4>
                      </div>
                    </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">STOCK OUT</h4>
                      <p>Total Stock Out</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-downvote" style="font-size: 20px"></i> {{ $tcountso }}</h4>
                  </div>
                </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">CURRENT STOCK</h4>
                      <p>Total Available Stocks</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-box" style="font-size: 20px"></i> {{ $tcounts }}</h4>
                  </div>
                </div>
               </div>
            </div>
          </div>
          <div class="row">
            <div class="row flex-grow">
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">STOCK VALUE</h4>
                          <p>Total Stock value</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-dollar-circle" style="font-size: 20px"></i> {{ $tcountsv }}</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">STOCK COST</h4>
                          <p>Total Stock Cost</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-dollar-circle" style="font-size: 20px"></i> {{ $tcountsc }}</h4>
                      </div>
                    </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">RE-ORDER</h4>
                      <p>ReOrder Stocks</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-archive-in" style="font-size: 20PX"></i> {{ $countreorder }}</h4>
                  </div>
                </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">STOCK SUMMARY</h4>
                      <p><code class="text-dark" style="font-size: 16px; font-weight: bold">In Stock</code> - {{$tcountis}}</p>
                      <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Low Stock</code> - {{$tcountls}}</p>
                      <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Out of Stock</code> - {{$tcountos}}</p>
                  </div>
                </div>
               </div>
            </div>
          </div>
          <div class="flex text-center" style="padding-top: 10px">
            <a class="btn btn-warning btn-icon-text" style="margin-right: 50px: color: #fff" href="{{ route('receives.create') }}">
              <i class="bi bi-arrow-down-circle-fill btn-icon-prepend" style="font-size: 18px"></i>Recieve Stock
            </a>
            <a class="btn btn-primary btn-icon-text" href="{{ route('issues.create') }}">
              <i class="bi bi-arrow-up-circle-fill btn-icon-prepend" style="font-size: 18px"></i>Issue Stock
            </a>
        </div>
        </div>
      </div>
    </div>

    <div class="row d-flex">
      <div class="col-xl-8 d-flex grid-margin stretch-card">
        <div class="card" style="border-radius: 10px">
          <div class="card-body">
            <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #1e90ff">BASIC INFORMATION</h4>
            <div class="row">
                <div class="col-sm-12">
                  <p style="margin-bottom: 20px">Remember, it's important to keep your information up-to-date for accurate records and communication. If you notice any incorrect information on your profile, please initiate a request for change.</p>
                  <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Name: </code>{{ $user->name }}</p>
                  <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Email: </code> {{ $user->email }}</p>
                  <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Contact Number: </code> {{ $user->contact_number }}</p>
                </div>
            </div>
        </div>
        </div>
      </div>

      <div class="col-xl-4 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px">
          <div class="card-body">
            <h4 class="card-title mb-3">Recent Activity</h4>
            <div class="row">
              <div class="col-sm-12">
                <div class="text-dark">
                  @if($activities->count() > 0)
                    @foreach ($activities as $activity)
                        @if ($activity->activity == 'CREATE')
                          <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                            <div class="mr-3"><i class="ri-shopping-cart-2-fill icon-md" style="color: #37b246"></i></div>
                            <div class="font-weight-bold mr-sm-4">
                              <div>Add New Product</div>
                              <div class="text-muted font-weight-normal mt-1">{{ $activity->actname }}</div>
                            </div>
                            <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $activity->details }}</h6></div>
                          </div>
                        @elseif ($activity->activity == 'STOCK IN')
                          <div class="d-flex pb-3 border-bottom justify-content-between">
                            <div class="mr-3"><i class="ri-inbox-archive-fill icon-md" style="color:#f8b500"></i></div>
                            <div class="font-weight-bold mr-sm-4">
                              <div>Stock In</div>
                              <div class="text-muted font-weight-normal mt-1">{{ $activity->actname }}</div>
                            </div>
                            <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $activity->details }}</h6></div>
                          </div>
                        @elseif ($activity->activity == 'STOCK OUT')
                          <div class="d-flex pb-3 border-bottom justify-content-between">
                            <div class="mr-3"><i class="ri-inbox-unarchive-fill icon-md" style="color:#4d4dff"></i></div>
                            <div class="font-weight-bold mr-sm-4">
                              <div>Stock Out</div>
                              <div class="text-muted font-weight-normal mt-1">{{ $activity->actname }}</div>
                            </div>
                            <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $activity->details }}</h6></div>
                          </div>
                        @elseif ($activity->activity == 'REMOVE STOCK')
                          <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                            <div class="mr-3"><i class="ri-delete-bin-2-fill icon-md" style="color: #913831"></i></div>
                            <div class="font-weight-bold mr-sm-4">
                              <div>Remove Stock</div>
                              <div class="text-muted font-weight-normal mt-1">{{ $activity->actname }}</div>
                            </div>
                            <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $activity->details }}</h6></div>
                          </div>
                        @elseif ($activity->activity == 'REORDER' || $activity->activity == 'ORDER'|| $activity->activity == 'REQUEST ORDER')
                          <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                            <div class="mr-3"><i class="ri-inbox-fill icon-md" style="color: #e39ff6"></i></div>
                            <div class="font-weight-bold mr-sm-4">
                              @if ($activity->activity == 'REORDER')
                                <div>ReOrder Stock</div>
                              @elseif ($activity->activity == 'REQUEST ORDER')
                                <div>Request Order Stock</div>
                              @else
                                <div>Order Stock</div>
                              @endif
                              <div class="text-muted font-weight-normal mt-1">{{ $activity->actname }}</div>
                            </div>
                            <div><h6 class="font-weight-bold text-info ml-sm-2">{{ $activity->details }}</h6></div>
                          </div>
                        @endif
                    @endforeach
                  @else
                    <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                      <div class="mr-3"><i class="bi bi-exclamation-square-fill icon-md" style="color: red"></i></div>
                      <div class="font-weight-bold mr-sm-4">
                        <div>No Recent Activity</div>
                        <div class="text-muted font-weight-normal mt-1">NONE</div>
                      </div>
                      <div><h6 class="font-weight-bold text-info ml-sm-2">0</h6></div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
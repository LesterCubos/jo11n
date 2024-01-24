@extends('clerk.layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
    <div class="row">
      <div class="col-sm-12 mb-4 mb-xl-0 text-center">
        <h4 class="font-weight-bold text-dark ">Welcome to John 11 Store Inventory Management System</h4>
        <h4 style="color: blue">
            <?php  date_default_timezone_set('Asia/Manila');
              echo "Today is " . date("l, m-d-Y. h:i a");?>
        </h4>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success fade in alert-dismissible show" role="alert" style="margin-top: 20px; margin-bottom: 20px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true" style="font-size:20px">×</span>
         </button>    
         <strong>{{ session('success') }}</strong> {{ __('You are logged in as ') }} {{ Auth::user()->department }}  Clerk!!
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

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card" style="margin-top: 30px; border-radius: 10px; background-color: #2e9cca">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="card-title" style="font-size: 20px">Overview</h4>
            {{-- <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle text-dark pt-0 pr-0" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px">
                  <i class="ri-filter-2-fill" style="font-size: 16px"></i> Today
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
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">TOTAL PRODUCTS</h4>
                          <p>Total Number of Products</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-cart-alt" style="font-size: 20px"></i> {{ $tcountp }}</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">STOCK IN</h4>
                          <p>Total Stock In</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-upvote" style="font-size: 20px"></i> {{ $tcountsi }}</h4>
                      </div>
                    </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">STOCK OUT</h4>
                      <p>Total Stock Out</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-downvote" style="font-size: 20px"></i> {{ $tcountso }}</h4>
                  </div>
                </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">CURRENT STOCK</h4>
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
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">STOCK VALUE</h4>
                          <p>Total Stock value</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-dollar-circle" style="font-size: 20px"></i> {{ $tcountsv }}</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">STOCK COST</h4>
                          <p>Total Stock Cost</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-dollar-circle" style="font-size: 20px"></i> {{ $tcountsc }}</h4>
                      </div>
                    </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">RE-ORDER</h4>
                      <p>ReOrder Stocks</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-archive-in" style="font-size: 20PX"></i> {{ $countreorder }}</h4>
                  </div>
                </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">STOCK SUMMARY</h4>
                      <p><code class="text-dark" style="font-size: 16px; font-weight: bold">In Stock</code> - {{$tcountis}}</p>
                      <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Low Stock</code> - {{$tcountls}}</p>
                      <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Out of Stock</code> - {{$tcountos}}</p>
                  </div>
                </div>
               </div>
            </div>
          </div>
          <div class="flex text-center" style="padding-top: 10px">
            <a href="" class="btn btn-warning btn-icon-text" style="margin-right: 50px: color: #fff">
              <i class="bi bi-arrow-down-circle-fill btn-icon-prepend" style="font-size: 18px"></i>Recieve Stock
            </a>
            <a href="" class="btn btn-primary btn-icon-text">
              <i class="bi bi-arrow-up-circle-fill btn-icon-prepend" style="font-size: 18px"></i>Issue Stock
            </a>
        </div>
        </div>
      </div>
    </div>

    <br>
    <div class="row d-flex">
        <div class="col-xl-8 d-flex grid-margin stretch-card">
            <div class="card" style="border-radius: 10px">
              <div class="card-body">
                <h4 class="card-title" style="font-size: 16px; letter-spacing: 1px; color: #d67229">BASIC INFORMATION</h4>
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
              <h4 class="card-title mb-3" style="font-size: 16px; letter-spacing: 1px; color: #d67229">Request Summary</h4>
              <div class="row">
                <div class="col-sm-12">
                  <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Pending Request</code> - {{$trp}}</p>
                  <p><code class="text-dark" style="font-size: 16px; font-weight: bold">Low Stock</code> - {{$trc}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
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

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card" style="margin-top: 30px; border-radius: 10px; background-color: #2e9cca">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="card-title" style="font-size: 20px">Overview</h4>
            <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle text-dark pt-0 pr-0" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px">
                  <i class="ri-filter-2-fill" style="font-size: 16px"></i> Today
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 23px, 0px);">
                  <h6 class="dropdown-header">Today</h6>
                  <h6 class="dropdown-header">This week</h6>
                  <h6 class="dropdown-header">This month</h6>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="row flex-grow">
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title">TOTAL PRODUCTS</h4>
                          <p>23% increase in conversion</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-cart-alt" style="font-size: 20px"></i> 43,981</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title">STOCK IN</h4>
                          <p>6% decrease in earnings</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-upvote" style="font-size: 20px"></i> 55</h4>
                      </div>
                    </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title">STOCK OUT</h4>
                      <p>23% increase in conversion</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-downvote" style="font-size: 20px"></i> 43</h4>
                  </div>
                </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title">CURRENT STOCK</h4>
                      <p>23% increase in conversion</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-box" style="font-size: 20px"></i> 439</h4>
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
                          <h4 class="card-title">STOCK VALUE</h4>
                          <p>20% increase in conversion</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-dollar-circle" style="font-size: 20px"></i> 43,981</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                    <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                      <div class="card-body">
                          <h4 class="card-title">EXPIRED STOCKS</h4>
                          <p>8% decrease in earnings</p>
                          <h4 class="text-dark font-weight-bold mb-2"><i class="bi bi-clock-fill" style="font-size: 20px"></i> 3</h4>
                      </div>
                    </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title">RE-ORDER</h4>
                      <p>13% increase in conversion</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-archive-in" style="font-size: 20PX"></i> 481</h4>
                  </div>
                </div>
               </div>
    
               <div class="col-xxl-4 col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 15px; background-color: #f9f6f2">
                  <div class="card-body">
                      <h4 class="card-title">OUT OF STOCK</h4>
                      <p>25% increase in conversion</p>
                      <h4 class="text-dark font-weight-bold mb-2"><i class="bx bxs-archive-out" style="font-size: 20px"></i> 981</h4>
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
            <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Website Audience Metrics</h4>
                  <div class="row">
                    <div class="col-lg-5">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p>
                    </div>
                    <div class="col-lg-7">
                      <div class="chart-legends d-lg-block d-none" id="chart-legends"></div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <canvas id="web-audience-metrics-satacked" class="mt-3"></canvas>
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
                    <div class="d-flex pb-3 border-bottom justify-content-between">
                      <div class="mr-3"><i class="ri-inbox-archive-line icon-md" style="color:#f8b500"></i></div>
                      <div class="font-weight-bold mr-sm-4">
                        <div>Stock In</div>
                        <div class="text-muted font-weight-normal mt-1">32 Minutes Ago</div>
                      </div>
                      <div><h6 class="font-weight-bold text-info ml-sm-2">$325</h6></div>
                    </div>
                    <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                      <div class="mr-3"><i class="ri-shopping-cart-2-line icon-md" style="color: #37b246"></i></div>
                      <div class="font-weight-bold mr-sm-4">
                        <div>Add New Item</div>
                        <div class="text-muted font-weight-normal mt-1">45 Minutes Ago</div>
                      </div>
                      <div><h6 class="font-weight-bold text-info ml-sm-2">$4987</h6></div>
                    </div>
                    <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                      <div class="mr-3"><i class="ri-inbox-unarchive-line icon-md" style="color: #4d4dff"></i></div>
                      <div class="font-weight-bold mr-sm-4">
                        <div>Deposit has updated to Paid                              </div>
                        <div class="text-muted font-weight-normal mt-1">1 Days Ago</div>
                      </div>
                      <div><h6 class="font-weight-bold text-info ml-sm-2">$5391</h6></div>
                    </div>
                    <div class="d-flex pt-3 justify-content-between">
                      <div class="mr-3"><i class="ri-shopping-cart-2-line icon-md" style="color: #37b246"></i></div>
                      <div class="font-weight-bold mr-sm-4">
                        <div>Add New Item</div>
                        <div class="text-muted font-weight-normal mt-1">3 weeks Ago</div>
                      </div>
                      <div><h6 class="font-weight-bold text-info ml-sm-2">$264</h6></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
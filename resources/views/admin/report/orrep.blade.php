@extends('admin.layouts.app')

@section('title','Order Report')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
    <div class="pagetitle">
        <h1 style="font-weight: bolder">Manage Reports</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
                <li class="breadcrumb-item">Report Management</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Order Report</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <a href="{{ route('diff_report.index') }}" class="btn btn-primary btn-icon-text" style="margin-bottom: 20px">
      <i class="icon-arrow-left btn-icon-prepend"></i>
      Go Back
    </a>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="margin-top: 30px; border-radius: 10px; background-color: #2e9cca">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-center mb-3 text-center">
              <h4 class="card-title text-center" style="font-size: 18px; letter-spacing: 1px; font-width: bold; color: white">ORDER REPORT</h4>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ORDER DATE</th>
                            <th>ORDER NO</th>
                            <th>ITEMS ORDERED</th>
                            <th>TOTAL COST</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->ordate }}</td>
                                    <td>{{ $order->tron }}</td>
                                    <td>{{ $order->orstatus }}</td>
                                    <td>
                                        @foreach ($stocks as $stock) 
                                            @if ($stock->stock_sku == $order->orsku) 
                                            @php
                                                $tpc = $order->orstatus * $stock->purchase_cost;
                                            @endphp
                                            {{ $tpc }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

  </div>

@endsection

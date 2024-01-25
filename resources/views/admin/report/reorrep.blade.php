@extends('admin.layouts.app')

@section('title','Reorder Report')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
    <div class="pagetitle">
        <h1 style="font-weight: bolder">Manage Reports</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
                <li class="breadcrumb-item">Report Management</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Reorder Report</li>
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
              <h4 class="card-title text-center" style="font-size: 18px; letter-spacing: 1px; font-width: bold; color: white">REORDER REPORT</h4>
            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>SKU</th>
                                <th>CURRENT STOCK</th>
                                <th>MIN STOCK</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->stock_sku }}</td>
                                        <td>{{ $stock->stock_quantity }}</td>
                                        <td>
                                            @foreach ($products as $product) 
                                                @if ($product->product_sku == $stock->stock_sku) 
                                                    {{ $product->min_stock }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> 
                                            @foreach ($products as $product) 
                                                @if ($product->product_sku == $stock->stock_sku) 
                                                    @if ($stock->stock_quantity <= $product->min_stock)
                                                        <button type="button" class="btn btn-danger btn-rounded btn-icon disabled">
                                                            <i class="bi bi-exclamation-lg"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-success btn-rounded btn-icon disabled">
                                                            <i class="bi bi-check-lg"></i>
                                                        </button>
                                                    @endif
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
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>SKU</th>
                                <th>QUANTITY</th>
                                <th>PURCHASE COST</th>
                                <th>TOTAL</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($reorders as $reorder)
                                    <tr>
                                        <td>{{ $reorder->orsku }}</td>
                                        <td>{{ $reorder->orstatus }}</td>
                                        <td>
                                            @foreach ($stocks as $stock) 
                                                @if ($reorder->orsku == $stock->stock_sku) 
                                                    {{ $stock->purchase_cost }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> 
                                            @foreach ($stocks as $stock) 
                                                @if ($reorder->orsku == $stock->stock_sku) 
                                                    @php
                                                        $tpc = $reorder->orstatus * $stock->purchase_cost;
                                                    @endphp
                                                    {{ $tpc }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; font-size: 24px">
                                            <div class="py-5" style="">No Reorder Found...</div>
                                        </td>  
                                    </tr>
                                @endforelse
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

  </div>

@endsection

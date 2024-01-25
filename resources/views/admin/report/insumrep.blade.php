@extends('admin.layouts.app')

@section('title','Inventory Summary Report')
@section('content')

<style>
    .table-dark-bordered {
      border: 2px solid #ccc;
    }
    .table-dark-bordered th,
    .table-dark-bordered td {
      border: 2px solid #333;
    }
</style>

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
    <div class="pagetitle">
        <h1 style="font-weight: bolder">Manage Reports</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink">
                <i class="bi bi-house-fill"></i> Dashboard</a></li>
                <li class="breadcrumb-item">Report Management</li>
            <li class="breadcrumb-item active" style="font-weight: 700">Inventory Summary Report</li>
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
              <h4 class="card-title text-center" style="font-size: 18px; letter-spacing: 1px; font-width: bold; color: white">INVENTORY TURNOVER REPORT</h4>
            </div>
            <div class="table-responsive pt-3">
                <table class="table table-dark-bordered table-light">
                    <thead class="bg-warning">
                    <tr>
                        <th>
                        Department
                        </th>
                        <th>
                        Beginning Inventory
                        </th>
                        <th>
                        Ending Inventory
                        </th>
                        <th>
                        COGS
                        </th>
                        <th>
                        Inventory Turnover Ratio
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                        Overall
                        </td>
                        <td>
                        {{$totaloverallbeg}}
                        </td>
                        <td>
                        {{$totaloverallend}}
                        </td>
                        <td>
                            @php
                                $tempcogs = $totaloverallbeg - $totaloverallend;
                                $cogs = $tempcogs + $totaloverallbeg;
                            @endphp

                            {{ $cogs }}
                        </td>
                        <td>
                            @php
                                $turnover = $cogs / $totaloverallend;
                            @endphp
                            {{$turnover}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Grocery Department
                        </td>
                        <td>
                            {{$totaloverallbeggd}}
                        </td>
                        <td>
                            {{$totaloverallendgd}}
                        </td>
                        <td>
                            @php
                            $tempcogsgd = $totaloverallbeggd - $totaloverallendgd;
                            $cogsgd = $tempcogsgd + $totaloverallbeggd;
                        @endphp

                        {{ $cogsgd }}
                        </td>
                        <td>
                            @php
                                $turnovergd = $cogsgd / $totaloverallendgd;
                            @endphp
                        {{$turnovergd}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Apparel Department
                        </td>
                        <td>
                            {{$totaloverallbegad}}
                        </td>
                        <td>
                            {{$totaloverallendad}}
                        </td>
                        <td>
                            @php
                            $tempcogsad = $totaloverallbegad - $totaloverallendad;
                            $cogsad = $tempcogsad + $totaloverallbegad;
                        @endphp

                        {{ $cogsad }}
                        </td>
                        <td>
                            @php
                                $turnoverad = $cogsad / $totaloverallendad;
                            @endphp
                        {{$turnoverad}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Home Goods Department
                        </td>
                        <td>
                            {{$totaloverallbeghgd}}
                        </td>
                        <td>
                            {{$totaloverallendhgd}}
                        </td>
                        <td>
                            @php
                                $tempcogshgd = $totaloverallbeghgd - $totaloverallendhgd;
                                $cogshgd = $tempcogshgd + $totaloverallbeghgd;
                            @endphp

                        {{ $cogshgd }}
                        </td>
                        <td>
                            @php
                                $turnoverhgd = $cogshgd / $totaloverallendhgd;
                            @endphp
                        {{$turnoverhgd}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-3 text-center" style="margin-top: 20px">
                <p style="font-size: 18px; letter-spacing: 1px; font-width: bold; color: white">This table tells us that in the ( PERIOD) the store started with (Beginning Inventory) worth of inventory, ended with (Ending Inventory ) sold (COGS) worth of goods, and turned over its inventory (ITR) times.</p>
              </div>
          </div>
        </div>
    </div>

  </div>

@endsection

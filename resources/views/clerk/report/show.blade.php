@extends('clerk.layouts.app')
@section('title','Reports Form')
@section('content')

<div class="content-wrapper" style="background-image: radial-gradient(circle farthest-side, #fceabb, #f8b500);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Reports Management</li>
        <li class="breadcrumb-item active">Reports Form</li>
    </ol>
    </nav>
  </div><!-- End Page name -->
  
  @if(session('notif.success'))
        <div class="alert alert-success">
            {{ session('notif.success') }} 
        </div>
  @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px">
            <div class="card-body">
              <form class="forms-sample"method="POST" action="" enctype="multipart/form-data">

                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 text-center" style="margin-bottom: 5px">
                                <h5 style="color: #000; font-weight: bold">Report Form</h5>
                              </div>
                              <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Date</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control  @error('report_date') is-invalid @enderror" id="report_date" name="report_date" value="{{ $report->report_date }}" readonly>
                                          @error('report_date')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      </div>
                                    </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Reporter's Name</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control  @error('reporter_name') is-invalid @enderror" id="reporter_name" name="reporter_name" value="{{ $report->reporter_name }}" readonly>
                                      @error('reporter_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Department</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="{{ $report->department }}" readonly>
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Subject </label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ $report->subject }}" readonly>
                                      @error('subject')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-form-label">Request Details</label>
                                        <textarea  name="details" id="details" class="form-control @error('details') is-invalid @enderror" rows="7" value="" readonly>{{ $report->details }}</textarea>
                                          @error('details')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                    </div>
                                </div>
                              </div>
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <a href="{{ route('creports.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
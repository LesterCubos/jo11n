<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Reports Table</h4>
        <!-- Button trigger modal -->
        <button id="icon_add" type="button" class="btn btn-success btn-icon-text" data-toggle="modal" data-target="#confirm-report-add">
            <i class="bi bi-clipboard-data btn-icon-prepend"></i>Add New Report
        </button>

        <!-- Modal -->
        <div class="modal fade" id="confirm-report-add" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">{{ __('New Report') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="POST" action="{{ route('creports.store') }}" enctype="multipart/form-data">
                  @csrf
              <div class="modal-body">
                  <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Date</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control  @error('report_date') is-invalid @enderror" id="report_date" name="report_date" value="{{ $currentDate }}" required>
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
                                      <input type="text" class="form-control  @error('reporter_name') is-invalid @enderror" id="reporter_name" name="reporter_name" value="{{ $username }}" required>
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
                                        <input type="text" class="form-control  @error('department') is-invalid @enderror" id="department" name="department" value="{{ $userdept }}" required>
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
                                      <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
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
                                        <textarea  name="details" id="details" class="form-control @error('details') is-invalid @enderror" rows="7" value="{{ old('details') }}" required></textarea>
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
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
              </div>
              </form>
              </div>
          </div>
        </div>

        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Reports..." wire:model.lazy="searchCreport">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>REPORT DATE</th>
                <th>REPORTERS NAME</th>
                <th>SUBJECT</th>
                <th>DETAILS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($reports as $report)
                <tr>
                  <td>{{ $report->report_date }}</td>
                  <td>{{ $report->reporter_name}}</td>
                  <td>{{ $report->subject}}</td>
                  <td>{!! Str::limit($report->details,'250','...') !!}</td>
                  <td> 
                    <a href="/clerk/reports{{$report->id}}" class="btn btn-info"><i class="icon-eye"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Reports Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $reports->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

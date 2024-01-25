<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Reports Table</h4>

        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #3794fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Reports..." wire:model.lazy="searchReport">
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
                    <a href="/admin/reports{{$report->id}}" class="btn btn-info"><i class="icon-eye"></i></a>
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

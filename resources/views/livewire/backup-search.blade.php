<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">List of BackUps</h4>
        <form action="{{ route('our_backup_database') }}" method="get">
            <button style="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-down-fill btn-icon-prepend"></i> Download BackUp</button>
        </form>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead style="color: #000; font-weight: bolder">
              <tr>
                <th>DATE</th>
                <th>FILE NAME</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($backs as $back)
                  <tr>
                    <td>{{ $back->date }}</td>
                    <td>{{ $back->file_name }}</td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="2" style="text-align: center; font-size: 24px">
                          <div class="py-5" style="">No BackUps Found...</div>
                      </td>  
                  </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $backs->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

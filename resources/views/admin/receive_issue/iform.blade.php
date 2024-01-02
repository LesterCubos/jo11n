@extends('admin.layouts.app')
@section('title','Add Issue Stock')
@section('content')

<div class="content-wrapper" style="background-image: linear-gradient(to right, #b6fbff, #83a4d4);">
  <div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="abreadlink"><i class="bi bi-house-fill"></i> Dashboard</a></li>
        <li class="breadcrumb-item">Manage Issue Stocks</li>
        <li class="breadcrumb-item active">Issue Stocks</li>
    </ol>
    </nav>
  </div><!-- End Page name -->
  
  @if(session('notif.success'))
        <div class="alert alert-danger">
            {{ session('notif.success') }} 
        </div>
  @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border-radius: 10px">
            <div class="card-body">
              <form class="forms-sample"method="POST" action="{{ route('issues.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        @livewire('search-s-k-u')
                      </div>
                    </div>
                </div>
                
                
                <div class="flex text-center" style="padding-top: 10px">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{ route('receives.index')}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<script>
    // create onchange event listener for featured_poster input
    document.getElementById('receive_image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an poster, create a preview in featured_poster_preview
            document.getElementById('receive_image_preview').src = URL.createObjectURL(file)
        }
    }
  
</script>

@endsection
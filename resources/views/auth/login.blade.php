<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Login - {{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/J11logo.png') }}" rel="icon">
  {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

  <main style="background-image: radial-gradient( circle farthest-corner at 22.4% 21.7%, rgba(4,189,228,1) 0%, rgba(2,83,185,1) 100.2% );">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3" style="border-radius: 10px; border-color: #fdb147; border-style: groove; border-width: 10px; box-shadow: 10px 10px;">

                <div class="d-flex justify-content-center py-4">
                    <a href="/" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('img/J11text.png') }}" alt="" id="text">
                      <img src="{{ asset('img/J11logo.png') }}" alt="" id="logo">
                    </a>
                  </div><!-- End Logo -->

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                    @if (session('error'))
                      <div class="alert alert-danger fade in alert-dismissible show" role="alert"">   
                        <i class="bi bi-shield-fill-exclamation" style="margin-right: 7px; font-size: 18px"></i><strong>{{ session('error') }}</strong>
                      </div>
                    @endif
                  </div>
                    
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="col-12">
                      <label for="email" class="form-label">{{ __('Email Address') }}</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend" style="font-size: 20px"><i class="bi bi-person-fill"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">{{ __('Password') }}</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend" style="font-size: 20px"><i class="ri-lock-2-fill"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>

                    <div class="col-12 d-flex justify-content-between">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" onclick="myFunction()">
                        <label for="">Show Password<i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">{{ __('Login') }}</button>
                    </div>
                    {{-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                    </div> --}}
                    <div class="col-12">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
               <a href="" style="color: #000; font-weight: bolder">Designed by</a>  <a href="" style="color: #fff; font-weight: bolder">John11Store</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  <script>
        function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
   </script>

</body>

</html>

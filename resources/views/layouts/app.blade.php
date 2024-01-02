{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/J11logo.png') }}" rel="icon">
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=McLaren&family=Poppins:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">

    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendor/sp/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sp/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sp/base/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendor/sp/flag-icon-css/css/flag-icon.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/sp/font-awesome/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor\sp\fontawesome-free-6.4.2-web\css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/sp/jquery-bar-rating/fontawesome-stars-o.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sp/jquery-bar-rating/fontawesome-stars.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/sp/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sp/addstyle.css') }}">
    <!-- endinject -->

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    @livewireStyles

</head>
<body>

  <div class="container-scroller">
       
    @include('include.navigation')
    <!-- partial -->
    <div class="page-body-wrapper">
      
      @include('include.sidebar')
      <!-- partial -->
      <div class="main-panel">

        @yield('content')

        @include('include.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

      {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

    <!-- base:js -->
    <script src="{{ asset('vendor/sp/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('js/sp/off-canvas.js') }}"></script>
    <script src="{{ asset('js/sp/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/sp/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('vendor/sp/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/sp/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/sp/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>

    @livewireScripts

</body>
</html>


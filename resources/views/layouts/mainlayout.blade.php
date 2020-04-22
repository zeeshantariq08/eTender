<!DOCTYPE html>
<html lang="en">
@php
    header('Content-Type: text/html; charset=UTF-8');
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eTender</title>

    <!-- favicon -->
    <link rel=icon href= http://127.0.0.1:8000/img/favicon.png sizes="20x20" type="image/png">
    <!-- Vendor Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styles/css/vendor.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styles/css/style.css') }}">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styles/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles/css/select2.min.css') }}">
 {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css"> --}}
    @yield('styles')
    
{{--     <style>

            body{
              font-family: 'Noto Naskh Arabic', serif;
              font-size: 1.5em;
              direction: rtl;
            }
    </style> --}}
</head>
<body {{-- dir="{{(App::isLocale('en') ? 'ltr' : 'rtl')}}" --}}>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    
    @yield('navbar')
    
    
    <!-- header navbar end -->

    <!-- banner area start -->
    @yield('content')
    
  
    <footer >
        <div class="container">
            
            
            <div class="copy-right text-center">
                © Copyright eTender {{-- with  by <a href="https://codingeek.net/" target="_blank"><i class="fa fa-heart"></i><span>Codingeek.</span></a> --}}
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="{{ asset('js/scripts/js/vendor.js') }}"></script>
    <!-- main js  -->
    <script src=" {{ asset('js/scripts/js/main.js') }}"></script>
    <script src=" {{ asset('js/scripts/js/select2.min.js') }}"></script>
     <script>
        $('.select2').select2();
    </script>
    @yield('scripts')
</body>
</html>

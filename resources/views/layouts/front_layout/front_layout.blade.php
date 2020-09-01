<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/front_images/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('css/front_css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/nice-select.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/gijgo.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/slicknav.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/front_css/passtrength.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    @include('layouts.front_layout.front_header')
    @include('layouts.front_layout.front_slider')
    <!-- header-end -->
    @yield('content')


    <!-- footer start -->
    @include('layouts.front_layout.front_footer')

    <!--/ footer end  -->

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="{{url('js/front_js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{url('js/front_js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{url('js/front_js/popper.min.js')}}"></script>
    <script src="{{url('js/front_js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/front_js/owl.carousel.min.js')}}"></script>
    <script src="{{url('js/front_js/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('js/front_js/ajax-form.js')}}"></script>
    <script src="{{url('js/front_js/waypoints.min.js')}}"></script>
    <script src="{{url('js/front_js/jquery.counterup.min.js')}}"></script>
    <script src="{{url('js/front_js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('js/front_js/scrollIt.js')}}"></script>
    <script src="{{url('js/front_js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{url('js/front_js/wow.min.js')}}"></script>
    <script src="{{url('js/front_js/nice-select.min.js')}}"></script>
    <script src="{{url('js/front_js/jquery.slicknav.min.js')}}"></script>
    <script src="{{url('js/front_js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('js/front_js/plugins.js')}}"></script>
    <script src="{{url('js/front_js/gijgo.min.js')}}"></script>



    <!--contact js-->
    <script src="{{url('js/front_js/contact.js')}}"></script>
    <script src="{{url('js/front_js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{url('js/front_js/jquery.form.js')}}"></script>
    <script src="{{url('js/front_js/jquery.validate.min.js')}}"></script>
    <script src="{{url('js/front_js/mail-script.js')}}"></script>
    <script src="{{url('js/front_js/front_validate.js')}}"></script>
    <script src="{{url('js/front_js/passtrength.js')}}"></script>
    <script src="{{url('js/front_js/main.js')}}"></script>
</body>

</html>

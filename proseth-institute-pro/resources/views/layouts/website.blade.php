<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/images/logo/logo-icon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/websites/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/website/swiper/swiper.css') }}">
{{-- 
    <link rel="stylesheet" href="{{ asset('plugin/website/tooltip.css') }}" /> --}}
    @stack('css')
</head>

<body>
    @php 
        $setting = setting(); 
        $mainCategory = mainCategory();
        $subCategory = subCategory();
    @endphp
    @include('websites.partials.header')

    @yield('content')

    <div id="stop" class="scrollTop">
        <span><i class="fa fa-angle-double-up" aria-hidden="true"></i></span>
    </div>
    @include('websites.partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.1.4/simple-lightbox.jquery.js"></script> --}}

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/websites/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/bootsrapt.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/stellar.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/websites/simpleLightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/nice-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/jquery.ajaxchimp.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/jquery.counterup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/main-theme.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/beacon.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/websites/custom.js') }}"></script>

    @if (session('message'))
        <script src="{{ asset('js/admin/alert.js') }}"></script>
    @endif

    @stack('js')
</body>

</html>

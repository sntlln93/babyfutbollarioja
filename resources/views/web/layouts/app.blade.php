<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layouts.meta')
    <!-- Theme CSS -->
    <link href="{{ asset('web/css/main.css') }}" rel="stylesheet" media="screen">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @yield('styles')
</head>

<body>

    <!-- layout-->
    <div id="layout">
        <!-- Header-->
        @include('web.layouts.header')
        <!-- End Header-->

        <!-- Nav-->
        @include('web.layouts.nav')
        <!-- End Nav-->

        @yield('content')

        <!-- footer-->
        @include('web.layouts.footer')
        <!-- End footer-->
    </div>
    <!-- End layout-->

    <!-- ======================= JQuery libs =========================== -->
    <!-- jQuery local-->
    <script type="text/javascript" src="{{ asset('web/js/jquery.js') }}"></script>
    <!-- popper.js-->
    <script type="text/javascript" src="{{ asset('web/js/popper.min.js') }}"></script>
    <!-- bootstrap.min.js-->
    <script type="text/javascript" src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <!-- required-scripts.js-->
    <script type="text/javascript" src="{{ asset('web/js/theme-scripts.js') }}"></script>
    <!-- theme-main.js-->
    <script type="text/javascript" src="{{ asset('web/js/theme-main.js') }}"></script>
    <!-- ======================= End JQuery libs =========================== -->

    @yield('scripts')

</body>

</html>
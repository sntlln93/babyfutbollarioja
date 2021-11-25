<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layouts.meta')
    <!-- Theme CSS -->
    <link href="{{ asset('web/css/main.css') }}" rel="stylesheet" media="screen">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <style>
        .filterBtn {
            background-color: #fff;
            border: 1px solid rgba(204, 204, 204, 0.8);
            border-radius: 2em;
            color: #000;
            padding: 5px 10px;
            text-align: center;
            outline: none;
            cursor: pointer;
        }

        .filterBtn:focus {
            outline: none;
        }

        .filterBtn:hover,
        .filterBtn--selected {
            background-color: #2E59D9;
            color: #fff;
            font-weight: bold;
            border: 1px solid rgba(204, 204, 204, 0.8);
        }
    </style>
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
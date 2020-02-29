<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>IQAC Staff Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"> 
        <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.min.css') }}">
        @yield("css")
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            @include("includes.staff-nav")
            <div class="content-page">
            <div style="padding-top: 80px;"></div>
                @yield("content")
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/js/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
        <script src="{{ asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('assets/pages/dashboard.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        @yield("js")
    </body>
</html>
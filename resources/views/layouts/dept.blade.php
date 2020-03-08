<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>IQAC Department Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('assets-staff/images/favicon.ico') }}"> 
        <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.min.css') }}">
        @yield("css")
        <link href="{{ asset('assets-staff/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> 
        <link href="{{ asset('assets-staff/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets-staff/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include("includes.dept-nav") 
        
        <div class="wrapper">
            @if(Session::has('message'))  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif
            @yield("content")
        </div>
        <script src="{{ asset('assets-staff/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets-staff/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets-staff/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets-staff/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets-staff/js/waves.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/js/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
        <script src="{{ asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('assets-staff/pages/dashboard.js') }}"></script>
        <script src="{{ asset('assets-staff/js/app.js') }}"></script>  

        @yield("js")
    </body>
</html>
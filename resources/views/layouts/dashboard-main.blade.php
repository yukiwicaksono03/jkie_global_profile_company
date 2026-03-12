<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    {{-- <link rel="stylesheet" href="{{ asset("dashboard/assets/css/normalize.css") }}"> --}}
    <link rel="stylesheet" href="{{ asset("dashboard/assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dashboard/assets/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dashboard/assets/css/themify-icons.css") }}">
    {{-- <link rel="stylesheet" href="{{ asset("dashboard/assets/css/flag-icon.min.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("dashboard/assets/css/cs-skin-elastic.css") }}"> --}}
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset("dashboard/assets/scss/style.css") }}">
    {{-- <link href="{{ asset("dashboard/assets/css/lib/vector-map/jqvmap.min.css") }}" rel="stylesheet"> --}}

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    @stack('style')
</head>
<body>
    @include('layouts.dashboard-sidebar')
    <div id="right-panel" class="right-panel">
        {{-- @include('layouts.dashboard-navbar') --}}
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card px-3 py-2">
                @yield('main')
            </div>
        </div> 
    </div>

    <script src="{{ asset("dashboard/assets/js/vendor/jquery-2.1.4.min.js") }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script> --}}
    <script src="{{ asset("dashboard/assets/js/plugins.js") }}"></script>
    <script src="{{ asset("dashboard/assets/js/main.js") }}"></script>


    {{-- <script src="{{ asset("dashboard/assets/js/lib/chart-js/Chart.bundle.js") }}"></script> --}}
    <script src="{{ asset("dashboard/assets/js/dashboard.js") }}"></script>
    <script src="{{ asset("dashboard/assets/js/widgets.js") }}"></script>
    {{-- <script src="{{ asset("dashboard/assets/js/lib/vector-map/jquery.vmap.js") }}"></script>
    <script src="{{ asset("dashboard/assets/js/lib/vector-map/jquery.vmap.min.js") }}"></script>
    <script src="{{ asset("dashboard/assets/js/lib/vector-map/jquery.vmap.sampledata.js") }}"></script>
    <script src="{{ asset("dashboard/assets/js/lib/vector-map/country/jquery.vmap.world.js") }}"></script> --}}
    @stack('script')
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>

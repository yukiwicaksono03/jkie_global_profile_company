 <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <style>
        .roboto-<uniquifier> {
            font-family: "Roboto", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-variation-settings:
                "wdth" 100;
        }
        body{
            font-family: "Roboto", sans-serif;
        }
        .btn-green {
            background: #184D2B !important;
            color: white !important;
            border: 1px solid #184D2B !important;
        }
        .btn-green:hover {
            background: transparent !important;
            color: #184D2B !important;
            border: 1px solid #184D2B !important;
        }

        .btn-green-outline {
            background: transparent !important;
            color: #184D2B !important;
            border: 1px solid #184D2B !important;
        }

        .btn-green-outline:hover {
            background: #184D2B !important;
            color: white !important;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
        main {
            flex: 1; 
        }

        .footer {
            background: #212529;
            color: white;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
    </style>
    @stack('style')

    <title>@yield('title')</title>
</head>
<body style="background: #ebebeb">
    @include('layouts.navbar')
    <main>
        @yield('main')
    </main>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
    @stack('script')
</body>
</html>
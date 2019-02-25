<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
    <style type="text/css">
        html {
            height: 100%;
        }

        body {
            height: 100%;
            margin: auto;
            text-align: center;
        }

        .navbar-brand {
            font-family: 'Niconne', cursive;
            font-size: 30px;
        }

        .content {
            height: 100%;
        }

        .chart {
            height: 50%;
            margin: 0 auto;
        }

    </style>
</head>

<body class="body">
    @include('layouts.nav')
	
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
    <!-- load scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    
	@yield('scripts')
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
    <style type="text/css">
      html {
          background-color: #E1E1E1;
          height: 100%;
      }
      body {
          background-color: #E1E1E1;
          height: 100%;
          margin: auto;
          text-align: center;
      }
    .navbar-brand {
        font-family: 'Niconne', cursive;
        font-size: 30px;
     }
     .content {
         background-color: #E1E1E1;
         height: 100%;
      }
      .chart {
          height: 80%;
          margin: 0 auto;
       }
    </style>
</head>

<body class="body">
    @include('layouts.nav')
    
    <h1>@yield('title')</h1>
	
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

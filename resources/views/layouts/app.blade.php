<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <style type="text/css">
    body {
      margin: auto;
      text-align: center;
    }
  </style>
</head>
<body class="body">
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
</body>

</html>

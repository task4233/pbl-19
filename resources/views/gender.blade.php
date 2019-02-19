@extends('layouts.visualiseapp')

@section('title', 'Gender')

@section('menubar')
  @parent
  Gender Pie Chart
@endsection

@section('content')

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  </head>
  <body>

<div class="chart">
  <!-- chart.js -->
  <canvas id="pieCanvas"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("pieCanvas");
  var pieCanvas = new Chart(ctx, {
    // kind of graph
    type: 'pie',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($genders as $gender)
          "{{ $gender->gender }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56"
        ],
        // bg-color(on hover)
        hoverBackgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56"
        ],
        // datas of graph
        data: [
          @foreach ($genders as $gender)
            {{ $gender->gender_cnt }},
          @endforeach
        ]
      }]
      }
    });
    </script>
  </body>
</html>
@endsection

@section('footer')
copyright 2019 thinking_name
@endsection

@extends('layouts.app')
@extends('layouts.nav')

@section('title', 'Distance')

@section('nav')
@endsection

@section('content')
<div class="chart">
  <!-- chart.js -->
  <canvas id="pieCanvas"></canvas>
  <!-- end -->
</div>

<script>
    var barChartData = {
        labels: ['0<=x<5', '5<=x<10', '10<=x<15', '15<=x<20', '20<=x<25'],
        datasets: [{
                label: 'Resigned',
                backgroundColor: "#0000EE",
                borderColor: "#00F",
                borderWidth: 1,
                data: [
                    5,10,15,20,25,
                    ]
            }, {
                label: 'Not Resigned',
                backgroundColor: "#EE0000",
                borderColor: "#F00",
                borderWidth: 1,
                data: [
                    35,30,25,20,15,
                   ]
            }]

    };

  var ctx = document.getElementById("pieCanvas");
  ctx.style.height = 750;
  var pieCanvas = new Chart(ctx, {
    // kind of graph
    type: 'bar',
    // data setting
    data: barChartData,
    options: {
      legend: {
        display: true,
        position: 'right',
      },
      responsive: true,
      maintainAspectRatio: false,
    }
  });
</script>

<h1>Heading Conclusion</h1>
<p>
write something.
</p>
@endsection

@section('footer')
(c) 2019 hoge.
@endsection

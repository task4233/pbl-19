@extends('layouts.app')

@section('title', 'Age')

@section('content')
<div class="chart">
  <!-- chart.js -->
  <canvas id="pieCanvas" height="400"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("pieCanvas");
  ctx.style.height = 750;
  var pieCanvas = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        '<= 25', '25-30', '30-35', '>= 35'
      ],
      datasets: [{
        label: 'All Employees(Left)',
        backgroundColor: 'rgba(255, 120, 55, 0.5)',
        borderColor: 'rgb(255, 120, 55)',
        borderWidth: 1,
        data: [
          @foreach ($emp_result as $key => $value)
            {{ $value }},
          @endforeach
        ],
      },
      {
        label: 'Resigned People(Right)',
        backgroundColor: 'rgba(120, 120, 255, 0.5)',
        borderColor:'rgba(120, 120, 55)',
        borderWidth: 1,
        data: [
          @foreach ($resigned_result as $key => $value)
            {{ $value }},
          @endforeach
        ],
      }
      ],
    },
    options: {
      legend: {
        display: true,
        position: 'top',
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

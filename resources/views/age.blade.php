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
        borderColor: 'ghostwhite',
        borderWidth: 1,
        backgroundColor: [
          @for ($hue=0;$hue<count($emp_result);++$hue)
            "hsl(" + {{ $hue*360/count($emp_result)}} + ", 70%, 45%)",
          @endfor
        ],
        data: [
          @foreach ($emp_result as $key => $value)
            {{ $value }},
          @endforeach
        ],
      },
      {
        borderColor: 'gray',
        borderWidth: 1,
        backgroundColor: [
          @for ($hue=0;$hue<count($resigned_result);++$hue)
            "hsl(" + {{ $hue*360/count($resigned_result)}} + ", 50%, 40%)",
          @endfor
        ],
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
        display: false,
      },
      title: {
        display: true,
        position: 'top',
        text: 'All Employees(Left)/ Resigned People(Right)',
        fontSize: 30,
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

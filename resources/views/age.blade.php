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
    // kind of grapheme_strpos
    type: 'bar',
    // data setting
    data: {
      // labels
      labels: [
        '<= 25', '25-30', '30-35', '>= 35'
      ],
      //dataset
      datasets: [{
        label: 'All Employees(Left)',
        // bg-color
        borderColor: 'ghostwhite',
        borderWidth: 1,
        // bg-color
        backgroundColor: [
          @for ($hue=0;$hue<count($emp_result);++$hue)
            "hsl(" + {{ $hue*360/count($emp_result)}} + ", 70%, 45%)",
          @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($emp_result as $key => $value)
            {{ $value }},
          @endforeach
        ],
      },
      {
        label: 'Resigned People(Right)',
        // bg-color
        borderColor: 'gray',
        borderWidth: 1,
        // bg-color
        backgroundColor: [
          @for ($hue=0;$hue<count($resigned_result);++$hue)
            "hsl(" + {{ $hue*360/count($resigned_result)}} + ", 50%, 40%)",
          @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
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

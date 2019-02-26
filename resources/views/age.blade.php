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
<<<<<<< HEAD
    type: 'bar',
=======
    type: 'doughnut',
>>>>>>> 59f2a2ab32e4d2e63dbf9038805cc142fd93281a
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($resigned_ages as $age)
          "{{ $age->age }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
         'rgba(3, 201, 169, 1)',
         'rgba(230, 126, 34, 1)'
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($emp_ages as $age)
            {{ $age->age_cnt }},
          @endforeach
        ],
      },
      {
        // bg-color
        backgroundColor: [
         'rgba(3, 201, 169, 1)',
         'rgba(230, 126, 34, 1)'
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($resigned_ages as $age)
            {{ $age->age_cnt }},
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

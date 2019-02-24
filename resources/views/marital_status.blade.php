@extends('layouts.app')
@extends('layouts.nav')

@section('title', 'MaritalStatus')

@section('nav')
@endsection

@section('content')
<div class="chart">
  <!-- chart.js -->
  <canvas id="pieCanvas"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("pieCanvas");
  ctx.style.height = 750;
  var pieCanvas = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($marital_statuses as $marital_status)
          "{{ $marital_status->marital_status }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
          @for($cnt=1; $cnt<18; ++$cnt)
            "#{{ str_pad( dechex($cnt * (16777215/18)) , 6, "0", STR_PAD_LEFT) }}",
	  @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($marital_statuses as $marital_status)
            {{ $marital_status->marital_status_cnt }},
          @endforeach
        ],
      }],
    },
    options: {
      title: {
          display: true,
          text: 'MaritalStatus',
          position: 'bottom',
      },
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

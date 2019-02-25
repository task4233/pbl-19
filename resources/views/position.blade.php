@extends('layouts.app')

@section('title', 'Position')

@section('content')
<div class="chart">
  <!-- chart.js -->
  <canvas id="DoughnatCanvas" height="400"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("DoughnatCanvas");
  var DoughnatCanvas = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($positions as $position)
          "{{ $position->position }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
            @for($cnt=1; $cnt<=count($positions); ++$cnt)
            "#{{ str_pad( dechex(($cnt-1) * (16777215/count($positions))) , 6, "0", STR_PAD_LEFT) }}",
	  @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($positions as $position)
            {{ $position->position_cnt }},
          @endforeach
        ],
      }],
    },
    options: {
      title: {
          display: true,
          text: 'Position',
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

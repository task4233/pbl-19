@extends('layouts.app')

@section('title', 'Position')

@section('content')
<div class="chart">
  <!-- chart.js -->
  <canvas id="positionChart"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("positionChart");
  var positionChart = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'bar',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($resigned_positions as $position)
          "{{ $position->position }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
            @for($cnt=1; $cnt<=count($resigned_positions); ++$cnt)
            "#{{ str_pad( dechex(($cnt-1) * (16777215/count($resigned_positions))) , 6, "0", STR_PAD_LEFT) }}",
            @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [
        
        //],
        // datas of graph
        data: [
            @foreach ($emp_positions as $position)
            {{ $position->position_cnt }},
          @endforeach
        ],
                  },{
                      // bg-color
                      backgroundColor: [
            @for($cnt=1; $cnt<=count($resigned_positions); ++$cnt)
            "#{{ str_pad( dechex(($cnt-1) * (16777215/count($resigned_positions))) , 6, "0", STR_PAD_LEFT) }}",
            @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($resigned_positions as $position)
            {{ $position->position_cnt }},
          @endforeach
        ],
                  }],
    },
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

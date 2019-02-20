@extends('layouts.app')
@extends('layouts.nav')

@section('title', 'Reason types')

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
    // kind of graph
    type: 'pie',
    // data setting
    data: {
      // labels
      labels: [
        @foreach($reason_types as $reason_type) 
          "{{ $reason_type->reason_type }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
          @for($cnt=1; $cnt<count($reason_types); ++$cnt)
            "#{{ dechex($cnt * (16777215/count($reason_types))) }}",
	  @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($reason_types as $reason_type)
            {{ $reason_type->reason_cnt }},
          @endforeach
        ],
      }],
    },
    options: {
      title: {
          display: true,
          text: 'Leave',
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

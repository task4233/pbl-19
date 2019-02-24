@extends('layouts.app')

@section('title', 'Gender')

@section('content')
<div class="chart">
  <!-- chart.js -->
    <canvas id="genderChart" style="height:100%"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("genderChart");
  var genderChart = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
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
          @for($cnt=1; $cnt<18; ++$cnt)
            "#{{ str_pad( dechex($cnt * (16777215/18)) , 6, "0", STR_PAD_LEFT) }}",
	  @endfor
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($genders as $gender)
            {{ $gender->gender_cnt }},
          @endforeach
        ],
      }],
    },
    options: {
      title: {
          display: true,
          text: 'Gender',
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

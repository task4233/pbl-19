@extends('layouts.app')
@extends('layouts.nav')

@section('title', 'Gender')

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
<<<<<<< HEAD
    type: 'pie',
=======
    type: 'doughnut',
>>>>>>> 76c611a7bdfa625e7d49c4bf14e4fc0e19510b75
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($genders as $gender)
          "{{ isset($gender->gender) ? $gender->gender : 'NULL'}}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
<<<<<<< HEAD
          @for($cnt=1; $cnt<count($genders); ++$cnt)
            "#{{ str_pad( dechex($cnt * (16777215/count($genders))) , 6, \"0\", STR_PAD_LEFT) }}",
=======
          @for($cnt=1; $cnt<18; ++$cnt)
            "#{{ str_pad( dechex($cnt * (16777215/18)) , 6, "0", STR_PAD_LEFT) }}",
>>>>>>> 76c611a7bdfa625e7d49c4bf14e4fc0e19510b75
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

@extends('layouts.app')

@section('title', 'Gender')

@section('content')
<div class="chart">
  <!-- chart.js -->
    <canvas id="resignedGenderChart"></canvas>
  <!-- end -->
</div>
<div class="chart">
		<canvas id="empGenderChart"></canvas>
</div>

<script>
  var ctx = document.getElementById("resignedGenderChart");
  var resignedGenderChart = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($resigned_genders as $gender)
          "{{ $gender->gender }}",
        @endforeach
      ],
      //dataset
      datasets: [{
					// bg-color
					backgroundColor: [
							"orange",
							"skyblue",
					],
					// bg-color(on hover)
					//hoverBackgroundColor: [
					
					//],
					// datas of graph
					data: [
							@foreach ($emp_genders as $gender)
							{{ $gender->gender_cnt }},
							@endforeach
					],
					
      },{
					// bg-color
					backgroundColor: [
							"orange",
							"skyblue",
					],
					// bg-color(on hover)
					//hoverBackgroundColor: [
					
					//],
					// datas of graph
					data: [
							@foreach ($resigned_genders as $gender)
							{{ $gender->gender_cnt }},
							@endforeach
					],
			},],
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

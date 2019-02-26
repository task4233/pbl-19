@extends('layouts.app')

@section('title', 'Gender')

@section('content')
<div class="chart">
  <!-- chart.js -->
    <canvas id="genderChart"></canvas>
  <!-- end -->

<script>
  var ctx = document.getElementById("genderChart");
  var genderChart = new Chart(ctx, {
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
                      label: 'All Employees(Outer Circle)',
                      borderCoder: 'ghostwhite',
                      borderWidth: 1,
                      // bg-color
        backgroundColor: [
            'pink',
            'skyblue',
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
                      label: 'Resigned People(inner Circle)',
                      borderCoder: 'gray',
                      borderWidth: 1,
                      // bg-color
                      backgroundColor: [
                          'pink',
                          'skyblue',
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
      legend: {
        display: true,
        position: 'top',
        labels: {
                      fontSize: 30,
                  },
      },
      title: {
                  display: true,
                  position: 'top',
                  text: 'All Employees(Outer Circle)/ Resigned People(Inner Circle)',
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

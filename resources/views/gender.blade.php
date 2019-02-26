@extends('layouts.app')

@section('title', 'Gender')

@section('chart')
    <!-- chart.js -->
    <canvas id="genderChart" height=400></canvas>
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
            'skyblue',
            'pink',
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
                          'skyblue',
                          'pink',
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
@endsection

@section('table')
<h2>Resigned People</h2>
<table class="table table-bordered">
<thead>
<tr>
  <th scope="col">Rank</th>
  <th scope="col">Details</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportions</th>
</tr>
</thead>
<tbody>
<?php $num = 1; ?>
@foreach ($resigned_genders as $gender)
  <tr>
<th scope="row"><?php echo $num++; ?></th>
    <td>{{ $gender->gender }}</td>
    <td>{{ $gender->gender_cnt }}</td>
<td>{{ round(($gender->gender_cnt * 100.0 / $all_resigned_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
</script>
@endforeach
  <tr>
  <th scope="row">All</th>
    <td></td>
    <td>{{$all_resigned_cnt}}</td>
    <td>100%</td>
  </tr>
  <tr>
  <th scope="row">Diff</th>
    <td></td>
    <td></td>
    <td>{{76.56-23.44}}%</td>
  </tr>
</tbody>
</table>

<h2>All Employees</h1>
<table class="table table-bordered">
<thead>
<tr>
  <th scope="col">Rank</th>
  <th scope="col">Details</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportions</th>
</tr>
</thead>
<tbody>
<?php $num = 1; ?>
@foreach ($emp_genders as $gender)
  <tr>
<th scope="row"><?php echo $num++; ?></th>
    <td>{{ $gender->gender }}</td>
    <td>{{ $gender->gender_cnt }}</td>
<td>{{ round(($gender->gender_cnt * 100.0 / $all_emp_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
</script>
@endforeach
    <tr>
<th scope="row">All</th>
    <td></td>
    <td>{{$all_emp_cnt}}</td>
    <td>100%</td>
  </tr>
  <tr>
  <th scope="row">Diff</th>
    <td></td>
    <td></td>
    <td>{{59.72-40.28}}%</td>
  </tr>
</tbody>
</table>
@endsection

@section('study')
<ul>
  <li>"Male" have hight off work rate compared to "Female". (76.56%)</li>
<li>Compared with the rate with all employees, the resigned one(76.56%) is more than all(59.72%).</li>
</ul>
@endsection

@section('discuss')
<ul>
<li>The regime for women in Co-well might be equivalent.</li>
</ul>
@endsection

@section('content')
<ul>
<li>Co-well creates a good work environment for the employees.</li>
</ul>
@endsection

@section('footer')
(c) thinking_face.
@endsection

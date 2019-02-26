@extends('layouts.app')

@section('title', 'MaritalStatus')

@section('chart')
  <!-- chart.js -->
    <canvas id="maritalStatus" height=400></canvas>
  <!-- end -->

<script>
  var ctx = document.getElementById("maritalStatus");
  var maritalStatus = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($resigned_marital_statuses as $marital_status)
          "{{ $marital_status->marital_status }}",
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
          @foreach ($emp_marital_statuses as $marital_status)
            {{ $marital_status->marital_status_cnt }},
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
          @foreach ($resigned_marital_statuses as $marital_status)
            {{ $marital_status->marital_status_cnt }},
          @endforeach
        ],
      }
      ],
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
@foreach ($resigned_marital_statuses as $marital_status)
  <tr>
<th scope="row"><?php echo $num++; ?></th>
    <td>{{ $marital_status->marital_status }}</td>
    <td>{{ $marital_status->marital_status_cnt }}</td>
<td>{{ round(($marital_status->marital_status_cnt * 100.0 / $all_resigned_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
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
    <td>{{60.39-39.61}}%</td>
  </tr>
</tbody>
</table>

<h2>All Employees</h2>
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
@foreach ($emp_marital_statuses as $marital_status)
  <tr>
<th scope="row"><?php echo $num++; ?></th>
    <td>{{ $marital_status->marital_status }}</td>
    <td>{{ $marital_status->marital_status_cnt }}</td>
<td>{{ round(($marital_status->marital_status_cnt * 100.0 / $all_emp_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
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
    <td>{{55.3-44.7}}%</td>
  </tr>
</tbody>
</table>
@endsection

@section('study')
<ul>
<li>The proportion of resigned single people(60.39%) is more than resigned married one(39.61%).</li>
<li>The difference in the proportion between resigned single people(20.78%) and resigned married people is more than All one(10.6%).
</ul>
@endsection

@section('discuss')
<h1>Please add here!!!!!!!!!!!!!!!!!</h1>
@endsection

@section('content')
<h1>Please add here!!!!!!!!!!!!!!!!!</h1>
@endsection

@section('footer')
(c) thinking_face.
@endsection

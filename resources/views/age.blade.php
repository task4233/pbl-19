@extends('layouts.app')

@section('title', 'Age')

@section('chart')
  <!-- chart.js -->
  <canvas id="pieCanvas" height="400"></canvas>
  <!-- end -->

<script>
  var ctx = document.getElementById("pieCanvas");
  var pieCanvas = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
          @foreach ($resigned_result as $age => $cnt)
 "{{ $age }}",
          @endforeach
      ],
      datasets: [{
        borderColor: 'ghostwhite',
        borderWidth: 1,
        backgroundColor: [
          @for ($hue=0;$hue<count($emp_result);++$hue)
            "hsl(" + {{ $hue*360/count($emp_result)}} + ", 70%, 45%)",
          @endfor
        ],
        data: [
          @foreach ($emp_result as $key => $value)
            {{ $value }},
          @endforeach
        ],
      },
      {
        borderColor: 'gray',
        borderWidth: 1,
        backgroundColor: [
          @for ($hue=0;$hue<count($resigned_result);++$hue)
            "hsl(" + {{ $hue*360/count($resigned_result)}} + ", 50%, 40%)",
          @endfor
        ],
        data: [
          @foreach ($resigned_result as $key => $value)
            {{ $value }},
          @endforeach
        ],
      }
      ],
    },
    options: {
      legend: {
        display: false,
      },
      title: {
        display: true,
        position: 'top',
        text: 'All Employees(Left)/ Resigned People(Right)',
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
  <th scope="col">Range</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportion</th>
</tr>
</thead>
<tbody>
@foreach ($resigned_result as $age => $cnt)
  <tr>
<th scope="row">{{ $age }}</th>
    <td>{{ $cnt }}</td>
<td>{{ round(($cnt * 100.0 / $all_resigned_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
</script>
@endforeach
  <tr>
  <th scope="row">All</th>
    <td>{{$all_resigned_cnt}}</td>
    <td>100%</td>
  </tr>
  <tr>
</tbody>
</table>

<h2>All Employees</h1>
<table class="table table-bordered">
<thead>
<tr>
  <th scope="col">Range</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportions</th>
</tr>
</thead>
<tbody>
@foreach ($emp_result as $age => $cnt)
  <tr>
<th scope="row">{{ $age }}</th>
    <td>{{ $cnt }}</td>
<td>{{ round(($cnt * 100.0 / $all_emp_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
</script>
@endforeach
    <tr>
<th scope="row">All</th>
    <td>{{$all_emp_cnt}}</td>
    <td>100%</td>
  </tr>
</tbody>
</table>
@endsection

@section('study')
<ul>
<li>Among resigned people, the proportion of people who are over 25 years old and under 30 years old is the most.<li>
</ul>
@endsection

@section('discuss')
<ul>
<li>People whose age is over 25 years old and under 30 years old tend to resign.</li>
</ul>
@endsection

@section('content')
<ul>
   <li>Except people who are under 25 years old, they tend to resign at the same proportion regardless of their ages.</li>
</ul>
@endsection

@section('footer')
(c) 2019 hoge.
@endsection

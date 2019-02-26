@extends('layouts.app')

@section('title', 'Position')

@section('chart')
		<!-- chart.js -->
		<canvas id="positionChart" height=400></canvas>
		<!-- end -->

<script>
 var ctx = document.getElementById("positionChart");
 var positionChart = new Chart(ctx, {
     type: 'bar',
     data: {
     // labels
             labels: [
                 @foreach ($resigned_positions_short as $key => $value)
                 "{{ ucfirst($key) }}",
                 @endforeach
             ],
             //dataset
             datasets: [{
                     label: 'Not resigned',
                     borderColor: 'ghostwhite',
                     borderWidth: 1,
                     // bg-color
                     backgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions_short);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions_short)}} + ", 70%, 45%)",
                         @endfor
                     ],
                     hoverBackgroundColor: [
                          @for ($hue=0;$hue<count($resigned_positions_short);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions_short)}} + ", 80%, 45%)",
                         @endfor
                     ],
                     data: [
                         @foreach ($emp_positions_short as $key => $value)
                            {{ $value }},
                         @endforeach
                     ],
                 },{
                     label: 'Resigned',
                     borderColor: 'gray',
                     borderWidth: 1,
                     // bg-color
                     backgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions_short);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions_short)}} + ", 50%, 40%)",
                         @endfor
                     ],
                     hoverBackgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions_short);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions_short)}} + ", 60%, 45%)",
                          @endfor
                     ],
                     data: [
                         @foreach ($resigned_positions_short as $key => $value)
                            {{ $value }},
                         @endforeach
                     ],
                 }],

         },
     options: {
            legend: {
                display: false,
                position: 'top',
                labels: {
                    fontSize: 30,
                },
            },
            title: {
                display: true,
                position: 'top',
                text: 'All Employees(Left)/ Resigned People(Right)',
                fontSize: 30,
            },
            xAxis: {
                plotLines: [{
                    color: 'red',
                    width: 2,
                    value: {{ $avg_resigned_positions }},
                }]
             },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    color: 'ghostwhite',
                }
            },
    }
    });
</script>
@endsection

@section('table')
<h2>Resigned People</h2>
<table class="table table-bordered">
<thead>
<tr>
  <th scope="col">Details</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportions</th>
</tr>
</thead>
<tbody>
@foreach ($resigned_positions_short as $position => $cnt)
  <tr>
<th scope="row">{{ ucfirst($position) }}</th>
    <td>{{ $cnt }}</td>
<td>{{ round(($cnt * 100.0 / $all_resigned_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
@endforeach
  <tr>
  <th scope="row">All</th>
    <td>{{$all_resigned_cnt}}</td>
    <td>100%</td>
  </tr>
</tbody>
</table>

<h2>All Employees</h1>
<table class="table table-bordered">
<thead>
<tr>
  <th scope="col">Labels</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportions</th>
</tr>
</thead>
<tbody>
@foreach ($emp_positions_short as $position => $cnt)
  <tr>
<th scope="row">{{ ucfirst($position) }}</th>
    <td>{{ $cnt }}</td>
<td>{{ round(($cnt * 100.0 / $all_emp_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
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
  <li>The proportions of Junior and Senior are over 70%.</li>
</ul>
@endsection

@section('discuss')
<ul>
<li>Pleeeeeeaaaaaaaaaaaaaaaaaaase add something!!!!!!!!!!!!</li>
</ul>
@endsection

@section('content')
<ul>
<li>Resigned people who are Junior and Senior often seek for new jobs.</li>
</ul>
@endsection

    @section('footer')
    (c) 2019 hoge.
    @endsection
    

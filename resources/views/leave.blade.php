@extends('layouts.app')

@section('title', 'Reason Types')

@section('chart')
    <!-- chart.js -->
    <canvas id="reasonChart" height=400></canvas>
    <!-- end -->
<script>
    var ctx = document.getElementById("reasonChart");
var reasonChart = new Chart(ctx, {
        // kind of graph
        type: 'doughnut',
        // data setting
        data: {
            // labels
            labels: [
                @foreach($reason_types as $reason_type => $reason_cnt)
				"{{ $reason_type }}",
                @endforeach
            ],
            //dataset
            datasets: [{
                    // bg-color
                    backgroundColor: [
                        @for ($hue=0;$hue<count($reason_types);++$hue)
                        "hsl(" + {{ $hue*360/count($reason_types)}} + ", 70%, 45%)",
                        @endfor
                    ],
                    // bg-color(on hover)
                    //hoverBackgroundColor: [
                    //],
                    // datas of graph
                    data: [
                        @foreach ($reason_types as $reason_type => $reason_cnt)
{{ $reason_cnt }},
                        @endforeach
                    ],
            }],
        },
     options: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontSize: 20,
                },
            },
            responsive: true,
            maintainAspectRatio: false,
        }
 })
</script>
@endsection

@section('table')
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
@foreach ($reason_types as $reason_type => $reason_cnt)
  <tr>
<th scope="row"><?php echo $num++; ?></th>
    <td>{{ $reason_type }}</td>
    <td>{{ $reason_cnt }}</td>
<td>{{ round(($reason_cnt * 100.0 / $all_cnt), 2, PHP_ROUND_HALF_DOWN) }}%</td>
  </tr>
</script>
@endforeach
    <tr>
<th scope="row">All</th>
    <td></td>
    <td>{{$all_cnt}}</td>
    <td>100%</td>
  </tr>

</tbody>
</table>
@endsection

@section('study')
<ul>
  <li>The main reason is <u>"Personal Issues"</u> (80.28%)</li>
</ul>
@endsection

@section('discuss')
<ul>
  <li>"Personal Issues" are <u>containing a lot of other reasons</u>.</li>
  <li>The database does not have details about "Personal Issues".</li>
  <li>It is hard to see from this chart.</li>
</ul>
@endsection
 
@section('content')
<ul class="conclusion">
  <li>We cannot specify "Personal Issues".</li>
</ul>
@endsection


@section('footer')
    (c) thinking_face
@endsection

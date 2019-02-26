@extends('layouts.app')

@section('title', 'Position')

@section('content')
<div class="chart">
		<!-- chart.js -->
		<canvas id="positionChart"></canvas>
		<!-- end -->
</div>

<script>
 var ctx = document.getElementById("positionChart");
 var positionChart = new Chart(ctx, {
     // kind of grapheme_strpos
     type: 'bar',
     // data setting
     data: {
             // labels
             labels: [
                 @foreach ($resigned_positions_short as $key => $value)
                 "{{ ucfirst($key) }}",
                 @endforeach
             ],
             //dataset
             datasets: [{
                     label: 'All Employees(Left)',
                     borderColor: 'ghostwhite',
                     borderWidth: 1,
                     // bg-color
                     backgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions_short);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions_short)}} + ", 70%, 45%)",
                         @endfor
                     ],
                     data: [
                         @foreach ($emp_positions_short as $key => $value)
                            {{ $value }},
                         @endforeach
                     ],
                 },{
                     label: 'Resigned People(Right)',
                     borderColor: 'gray',
                     borderWidth: 1,
                     // bg-color
                     backgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions_short);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions_short)}} + ", 50%, 40%)",
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
                 display: true,
                 position: 'top',
                 labels: {
                     fontSize: 30,
                 },
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

<h1>Heading Conclusion</h1>
<p>
write something.
    </p>
@endsection

    @section('footer')
    (c) 2019 hoge.
    @endsection

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
                 @foreach ($resigned_positions as $position)
                 "{{ $position->position }}",
                 @endforeach
             ],
             //dataset
             datasets: [{
                     label: 'Resigned People',
                     borderColor: 'white',
                     borderWidth: 1,
                     // bg-color
                     backgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions)}} + ", 70%, 45%)",
                         @endfor
                     ],
                     data: [
                         @foreach ($emp_positions as $position)
 {{ $position->position_cnt }},
                         @endforeach
                     ],
                 },{
                     label: 'All Employee People',
                     borderColor: 'white',
                     borderWidth: 1,
                     // bg-color
                     backgroundColor: [
                         @for ($hue=0;$hue<count($resigned_positions);++$hue)
                         "hsl(" + {{ $hue*360/count($emp_positions)}} + ", 80%, 40%)",
                         @endfor
                     ],
                     data: [
                         @foreach ($resigned_positions as $position)
 {{ $position->position_cnt }},
                         @endforeach
                     ],
                 }],
         },
     options: {
             legend: {
                 display: true,
                 position: 'top',
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

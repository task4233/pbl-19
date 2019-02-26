@extends('layouts.app')

@section('title', 'Reason types')

@section('content')
<div class="chart">
    <!-- chart.js -->
    <canvas id="reasonChart" height="400"></canvas>
    <!-- end -->
</div>
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

<h1>Heading Conclusion</h1>
<p>
		The main reason is "Personal Issues"(114/142): 80.28%.<br>
		It is hard to see from this chart.<br>
		That is because, "Personal Issues" are containing a lot of other reasons.<br>
		Thus, We have to specify the details.
</p>
@endsection

@section('footer')
    (c) thinking_face
@endsection

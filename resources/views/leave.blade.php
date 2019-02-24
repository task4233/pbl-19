@extends('layouts.app')

@section('title', 'Reason types')

@section('content')
<div class="chart">
    <!-- chart.js -->
    <canvas id="pieCanvas"></canvas>
    <!-- end -->
</div>
<script>
    var ctx = document.getElementById("pieCanvas");
    var pieCanvas = new Chart(ctx, {
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
                        @for($cnt=1; $cnt<18; ++$cnt)
                        "#{{ dechex($cnt * (16777215/18)) }}",
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
            title: {
                display: true,
                text: 'Reason types',
                position: 'bottom',
            },
            legend: {
                display: true,
                position: 'right',
            },
            responsive: true,
            maintainAspectRatio: false,
        }
    })
</script>

<h1>Heading Conclusion</h1>
<p>
		write something.
</p>
@endsection

@section('footer')
    (c) 2019 hoge.
@endsection

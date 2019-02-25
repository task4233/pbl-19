@extends('layouts.app')

@section('title', 'Distance')

@section('content')
<div class="container">
    <!-- chart.js -->
    <canvas id="distanceChart" height="100"></canvas>
    <!-- end -->
</div>
<script>
    var array2 =  localStorage.getItem('number_of_people').split(',');
    var array1 = localStorage.getItem('number_of_resign_people').split(',');
    
    var barChartData = {
        labels: ['< 5km', '5-10 km', ' 10-15 km', '> 15km'],
        datasets: [{
            label: 'Resigned',
            backgroundColor: 'rgba(255, 120, 55, 0.5)',
            borderColor: 'rgb(255, 120, 55)',
            borderWidth: 1,
            data: array1
        }, {
            label: 'Not resigned',
            backgroundColor: 'rgba(120, 120, 255, 0.5)',
            borderColor:'rgba(120, 120, 55)',
            borderWidth: 1,
            data: array2
        }]

    };

    window.onload = function () {
        var ctx = document.getElementById('distanceChart').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                }
            }
        });
    };

</script>


<h1>Heading Conclusion</h1>
<p>
    write something.
</p>
@endsection

@section('footer')
(c) 2019 hoge.
@endsection

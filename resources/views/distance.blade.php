@extends('layouts.app')

@section('title', 'Gender')

@section('content')
<div class="chart">
    <!-- chart.js -->
    <canvas id="genderChart" style="height:100%"></canvas>
    <!-- end -->
</div>

<script>
    var radius = ['x < 5', '5 <= x < 10', '10 <= x < 15', '15 <= x'];
    var color = Chart.helpers.color;
    var barChartData = {
        labels: radius,
        datasets: [{
            label: 'x < 5',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [
                
            ]
        }, {
            label: 'Dataset 2',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }]

    };

    window.onload = function () {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        });

    };

   

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function () {
        var colorName = colorNames[barChartData.datasets.length % colorNames.length];
        var dsColor = window.chartColors[colorName];
        var newDataset = {
            label: 'Dataset ' + (barChartData.datasets.length + 1),
            backgroundColor: color(dsColor).alpha(0.5).rgbString(),
            borderColor: dsColor,
            borderWidth: 1,
            data: []
        };

        for (var index = 0; index < barChartData.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
        }

        barChartData.datasets.push(newDataset);
        window.myBar.update();
    });

    document.getElementById('addData').addEventListener('click', function () {
        if (barChartData.datasets.length > 0) {
            var month = MONTHS[barChartData.labels.length % MONTHS.length];
            barChartData.labels.push(month);

            for (var index = 0; index < barChartData.datasets.length; ++index) {
                // window.myBar.addData(randomScalingFactor(), index);
                barChartData.datasets[index].data.push(randomScalingFactor());
            }

            window.myBar.update();
        }
    });

    document.getElementById('removeDataset').addEventListener('click', function () {
        barChartData.datasets.pop();
        window.myBar.update();
    });

    document.getElementById('removeData').addEventListener('click', function () {
        barChartData.labels.splice(-1, 1); // remove the label first

        barChartData.datasets.forEach(function (dataset) {
            dataset.data.pop();
        });

        window.myBar.update();
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

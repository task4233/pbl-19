@extends('layouts.app')

@section('title', 'Distance')

@section('chart')
    <!-- chart.js -->
    <canvas id="distanceChart" height=100></canvas>
    <!-- end -->
<script>
    var array2 = localStorage.getItem('number_of_people').split(',');
    var array1 = localStorage.getItem('number_of_resign_people').split(',');
    var barChartData = {
        labels: ['< 5km', '5-10 km', ' 10-15 km', '> 15km'],
        datasets: [{
            label: 'Resigned People',
            backgroundColor: 'rgba(255, 120, 55, 0.5)',
            borderColor: 'rgb(255, 120, 55)',
            borderWidth: 1,
            data: array1
        }, {
            label: 'All Employees',
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
                    display: true,
                    position: 'top',
                    labels: {
                     fontSize: 30,
                 },
                }
            }
        });
    };

</script>
@endsection

@section('table')
<h2>Resigned People</h2>
<table class="table table-bordered">
<thead>
<tr>
  <th scope="col">Range</th>
  <th scope="col">Numbers</th>
  <th scope="col">Proportions</th>
</tr>
</thead>
<tbody>
<script>
    var sum = function(arr, fn) {
        if (fn) {
            return sum(arr.map(fn));
        }
        else {
            return arr.reduce(function(prev, current, i, arr) {
                return prev+current;
            });
        }
    };

    function orgFloor(value, base) {
        return Math.floor(value / base) * base;
    }

    var resigned_result = localStorage.getItem('number_of_resign_people').split(',');

    var all_resigned_cnt = sum(resigned_result, function(elm) {
        return Number(elm);
    });
    resigned_result = localStorage.getItem('number_of_resign_people').split(',');
    var labels = ['< 5km', '5-10 km', ' 10-15 km', '> 15km'];
    for(var index=0;index<labels.length;++index){
        document.write('<tr>');
        document.write('<th scope="row">' + labels[index] + '</th>');
        document.write('<td>' + resigned_result[index] + '</td>');
        document.write('<td>' + orgFloor(resigned_result[index]*100/all_resigned_cnt, 0.01)+ '%</td>');
        document.write('</tr>');
    }
 document.write('<tr>');
 document.write('<th scope="row">All</th>');
 document.write('<td>' + all_resigned_cnt + '</th>');
 document.write('<td>100%</td>');
 document.write('</tr>');
</script>
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
<script>
    var sum = function(arr, fn) {
        if (fn) {
            return sum(arr.map(fn));
        }
        else {
            return arr.reduce(function(prev, current, i, arr) {
                return prev+current;
            });
        }
    };

    function orgFloor(value, base) {
        return Math.floor(value / base) * base;
    }

    var resigned_result = localStorage.getItem('number_of_people').split(',');

    var all_emp_cnt = sum(resigned_result, function(elm) {
        return Number(elm);
    });
    emp_result = localStorage.getItem('number_of_people').split(',');
    var labels = ['< 5km', '5-10 km', ' 10-15 km', '> 15km'];
    for(var index=0;index<labels.length;++index){
        document.write('<tr>');
        document.write('<th scope="row">' + labels[index] + '</th>');
        document.write('<td>' + emp_result[index] + '</td>');
        document.write('<td>' + orgFloor(emp_result[index]*100/all_emp_cnt, 0.01)+ '%</td>');
        document.write('</tr>');
    }
 document.write('<tr>');
 document.write('<th scope="row">All</th>');
 document.write('<td>' + all_emp_cnt + '</th>');
 document.write('<td>100%</td>');
 document.write('</tr>');
</script>
</tbody>
</table>
@endsection

@section('study')
<ul>
<li>Most of the resigned people have distance from home to Co-Well company less than 5km.</li>
</ul>
@endsection

@section('discuss')
<ul>
  <li>People who far away from the company often do not tend to leave the job.</li>
</ul>
@endsection

@section('content')
<ul>
    <li>The people who are closer to the company tend to take more breaks.</li>
</ul>
@endsection

@section('footer')
(c) thinking_face.
@endsection

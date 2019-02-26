@extends('layouts.app')

@section('title', 'MaritalStatus')

@section('content')
<div class="chart">
  <!-- chart.js -->
  <canvas id="maritalStatus"></canvas>
  <!-- end -->
</div>

<script>
  var ctx = document.getElementById("maritalStatus");
  var maritalStatus = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($resigned_marital_statuses as $marital_status)
          "{{ $marital_status->marital_status }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
         'rgba(3, 201, 169, 1)',
         'rgba(230, 126, 34, 1)'
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($emp_marital_statuses as $marital_status)
            {{ $marital_status->marital_status_cnt }},
          @endforeach
        ],
      },
      {
        // bg-color
        backgroundColor: [
         'rgba(3, 201, 169, 1)',
         'rgba(230, 126, 34, 1)'
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($resigned_marital_statuses as $marital_status)
            {{ $marital_status->marital_status_cnt }},
          @endforeach
        ],
      }
      ],
    },
    options: {
      legend: {
        display: true,
        position: 'top',
        labels: {
                      fontSize: 30,
        },
      },
      title: {
                  display: true,
                  position: 'top',
                  text: 'All Employees(Outer Circle)/ Resigned People(Inner Circle)',
                  fontSize: 30,
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

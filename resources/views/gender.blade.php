<html>
<head>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</head>
<body>

<!-- chart.js -->
<canvas id="pieCanvas" width="400" height="400"></canvas>
<!-- end -->

<script>
var ctx = document.getElementById("pieCanvas");
var pieCanvas = new Chart(ctx, {
  // kind of graph
  type: 'pie',
  // data setting
  data: {
      // labels
      labels: [
        @foreach ($genders as $gender)
      "{{ $gender->gender }}",
        @endforeach
      ],
      //dataset
      datasets: [{
          // bg-color
          backgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          // bg-color(on hover)
          hoverBackgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          // datas of graph
          data: [
            @foreach ($genders as $gender)
               {{ $gender->gender_cnt }},
            @endforeach
      ]
    }]
  }
});
</script>
</body>
</html>
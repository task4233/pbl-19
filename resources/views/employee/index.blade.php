w<html>
<head>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</head>
<body>

<!-- chart.js -->
<canvas id="pieCanvas" width="400" height="400"></canvas>
<!-- end -->

<h1>Hello, Global PBL Teams!</h1>
<p>このページはデータベースに接続していくつかのデータを取得、表示するコードを例示するためのサンプルです。<br/>
詳しくは、Laravelのドキュメントを参照してください。 <a href="http://laravel.jp/">http://laravel.jp/</a></p>
<p>This page is an example for database connection and getting some records.<br/>
If you want to learning about Laravel framework so please see a laravel website. <a href="https://laravel.com/">https://laravel.com/</a></p>

<ol>
    @foreach ($employees as $emp)
        <li>{{$emp->name}}</li>
    @endforeach
</ol>

<script>
var ctx = document.getElementById("pieCanvas");
var pieCanvas = new Chart(ctx, {
  // kind of graph
  type: 'pie',
  // data setting
  data: {
      // lav
      labels: [],
      //データセット
      datasets: [{
          //背景色
          backgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //背景色(ホバーしたとき)
          hoverBackgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          // datas of graph
          data: [
  @foreach ($reason_types as $reason)
      {{ $reason->reason_cnt }}
  @endforeach
</ul>

      }]
  }
});
</script>
</body>
</html>

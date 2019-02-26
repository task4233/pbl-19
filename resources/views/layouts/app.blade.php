<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
      <title>@yield('title')</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
    <style type="text/css">
      html {
          height: 100%;
      }
      body {
          font-family: 'Lato', 'Noto Sans JP', '游ゴシック Medium', '游ゴシック体', 'Yu Gothic Medium', YuGothic, 'ヒラギノ角ゴ ProN', 'Hiragino Kaku Gothic ProN', 'メイリオ', Meiryo, 'ＭＳ Ｐゴシック', 'MS PGothic', sans-serif;
          height: 100%;
          margin: auto;
					letter-spacing: .1em;
					line-height: 1.65;
					font-size: 30px;
      }
		 h1 {
				 text-align: center;
		 }
.navbar-brand {
    font-family: 'Niconne', cursive;
    font-size: 30px;
 }
.container {
             margin: 5% auto;
    background-color: #E1E1E1;
             padding: 2%;
      }
      .chart {
					background-color: #E1E1E1;
					width: 85%;
          height: 80%;
          margin: 0 auto;
					padding: 2%
      }
		  table {
					background-color: white; 
			}
		 .conclusion {
				 text-decoration: underline;
		 }
.center {
    text-align: center;
 }

.hide {
              display: none;
 }
    </style>
</head>

<body>
    @include('layouts.nav')
    
    <h1 style="font-size:60px;">@yield('title')</h1>
	
		<div class="container">
				@yield('chart')
		</div>

		<div class="container">
				<h1>Results</h1>
				@yield('table')
	  </div>

		<div class="container">
				<h1>Study from Chart</h1>
				@yield('study')
		</div>
		
		<div class="container">
				<h1>Discuss @yield('title')</h1>
				@yield('discuss')
		</div>

    <div class="container ">
				<h1>Heading Conclusion</h1>
        @yield('content')
    </div>

    <!-- load scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    
	@yield('scripts')
</body>

</html>

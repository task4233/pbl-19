<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    <script>
    	var resign_address_list = [
            @forelse ($address_list as $item)
            '{{ $item }}',
            @empty
            @endforelse
        ];
        function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
            var R = 6371; // Radius of the earth in km
            var dLat = deg2rad(lat2-lat1);  // deg2rad below
            var dLon = deg2rad(lon2-lon1); 
            var a = 
                Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                Math.sin(dLon/2) * Math.sin(dLon/2)
                ; 
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var d = R * c; // Distance in km
            return d;
        }
        function deg2rad(deg) {
            return deg * (Math.PI/180)
        }
        var long1;
        var lat1;
        var long_array = new Array();
        var lat_array = new Array();
        var distances = new Array();
        var resign_distances = new Array();
        var address="3D Center Building, 3 Phố Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam";

        // if local storage does not have the result of ajax call
        if (!localStorage.getItem('number_of_people') || !localStorage.getItem('number_of_resign_people')) {
            $.ajax({
            type : "GET",
            url : "https://geocoder.api.here.com/6.2/geocode.json",
            data : {
                searchtext : address,
                app_id: "WJQVxZR8CSM7ecshD53Z",
                app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
            },
            success : function (data){
                long1 = data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Longitude;
                lat1 = data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Latitude;
            // data would be here if loading successfully
                for (var index = 0; index < address_list.length; index++) {
                    var dataToSend=address_list[index];
                    $.ajax({
                        type : "GET",
                        url : "https://geocoder.api.here.com/6.2/geocode.json",
                        data : {
                            searchtext: address_list[index],
                            app_id: "WJQVxZR8CSM7ecshD53Z",
                            app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
                        },
                        success : function (data){
                            if(data['Response']['View'].length!=0){
                                distances.push(getDistanceFromLatLonInKm(parseFloat(lat1),parseFloat(long1),data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Latitude,data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Longitude));
                        // data would be here if loading successfully
                            }
                        }
                    });
                }
                for (var index = 0; index < resign_address_list.length; index++) {
                    $.ajax({
                        type : "GET",
                        url : "https://geocoder.api.here.com/6.2/geocode.json",
                        data : {
                            searchtext : resign_address_list[index],
                            app_id: "WJQVxZR8CSM7ecshD53Z",
                            app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
                        },
                        success : function (data){
                            if(data['Response']['View'].length!=0){
                                resign_distances.push(getDistanceFromLatLonInKm(parseFloat(lat1),parseFloat(long1),data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Latitude,data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Longitude));
                        // data would be here if loading successfully
                            }
                        }
                    });
                }
            }
            });
            $(document).ajaxStop(function() {
            var pivot = new Array(0,5,10,15);
            var number_of_people = new Array(0,0,0,0);
            var number_of_resign_people = new Array(0,0,0,0);
            for (index = 0, len = pivot.length; index < len-2; index++) {
                for(index2 = 0,len2 = distances.length;index2<len2;index2++){
                    if(pivot[pivot.length-1]<distances[index2] && distances[index2]<100){
                        number_of_people[pivot.length-1]++;
                        continue;
                    }
                    if(pivot[index]<distances[index2] && distances[index2]<pivot[index+1]){
                        number_of_people[index]++;
                    }
                }
            }
            for (index = 0, len = pivot.length; index < len-2; index++) {
                for(index2 = 0,len2 = resign_distances.length;index2<len2;index2++){
                    if(pivot[pivot.length-1]<resign_distances[index2] && resign_distances[index2]<100){
                        number_of_people[pivot.length-1]++;
                        continue;
                    }
                    if(pivot[index]<resign_distances[index2] && resign_distances[index2]<pivot[index+1]){
                        number_of_resign_people[index]++;
                    }
                }
            }
            });
            localStorage.setItem('number_of_people', number_of_people);
            localStorage.setItem('number_of_resign_people', number_of_resign_people);
        }
    </body>
</html>

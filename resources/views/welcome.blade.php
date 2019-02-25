@extends('layouts.app')
@section('title', 'Thinking_face')
@section('content')
<div class="container">
    <img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/apple/155/thinking-face_1f914.png" alt="">
</div>
<h3>Welcome to Thinking_face</h3>
@endsection
@section('scripts')
<script>
    var resign_address_list = [
        @foreach($resigned_address_list as $item)
            '{{ $item->address }}', 
        @endforeach
    ];
    var address_list = [
        @foreach($address_list as $item)
            '{{ $item->address }}', 
        @endforeach
    ];
    function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2 - lat1); // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180)
    }

    var long1;
    var lat1;
    var long_array = new Array();
    var lat_array = new Array();
    var distances = new Array();
    var resign_distances = new Array();
    var address = "3D Center Building, 3 Phố Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam";

    // if local storage does not have the result of ajax call
    if (!localStorage.getItem('number_of_people') || !localStorage.getItem('number_of_resign_people')) {
        $.ajax({
            type: "GET",
            url: "https://geocoder.api.here.com/6.2/geocode.json",
            data: {
                searchtext: address,
                app_id: "WJQVxZR8CSM7ecshD53Z",
                app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
            },
            success: function (data) {
                long1 = data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Longitude;
                lat1 = data['Response']['View'][0]['Result'][0]['Location']['DisplayPosition'].Latitude;
                // data would be here if loading successfully
                console.log(address_list);
                for (var index = 0; index < address_list.length; index++) {
                    var dataToSend = address_list[index];
                    $.ajax({
                        type: "GET",
                        url: "https://geocoder.api.here.com/6.2/geocode.json",
                        data: {
                            searchtext: dataToSend,
                            app_id: "WJQVxZR8CSM7ecshD53Z",
                            app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
                        },
                        success: function (data) {
                            if (data['Response']['View'].length != 0) {
                                distances.push(getDistanceFromLatLonInKm(parseFloat(
                                        lat1),
                                    parseFloat(long1), data['Response']['View']
                                    [0][
                                        'Result'
                                    ][0]['Location']['DisplayPosition'].Latitude,
                                    data['Response']['View'][0]['Result'][0][
                                        'Location'
                                    ]['DisplayPosition'].Longitude));
                                // data would be here if loading successfully
                            }
                        }
                    });
                }
                for (var index = 0; index < resign_address_list.length; index++) {
                    var dataToSend = resign_address_list[index];
                    $.ajax({
                        type: "GET",
                        url: "https://geocoder.api.here.com/6.2/geocode.json",
                        data: {
                            searchtext: dataToSend,
                            app_id: "WJQVxZR8CSM7ecshD53Z",
                            app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
                        },
                        success: function (data) {
                            if (data['Response']['View'].length != 0) {
                                resign_distances.push(getDistanceFromLatLonInKm(
                                    parseFloat(
                                        lat1), parseFloat(long1), data[
                                        'Response'][
                                        'View'
                                    ][0]['Result'][0]['Location'][
                                        'DisplayPosition'
                                    ]
                                    .Latitude, data['Response']['View'][0][
                                        'Result'
                                    ]
                                    [0]['Location']['DisplayPosition'].Longitude
                                ));
                                // data would be here if loading successfully
                            }
                        }
                    });
                }
            }
        });
    }
    $(document).ajaxStop(function () {
            var pivot = new Array(0, 5, 10, 15);
            var number_of_people = new Array(0, 0, 0, 0);
            var number_of_resign_people = new Array(0, 0, 0, 0);
            for (index = 0, len = pivot.length; index < len - 2; index++) {
                for (index2 = 0, len2 = distances.length; index2 < len2; index2++) {
                    if (pivot[pivot.length - 1] < distances[index2] && distances[index2] < 100) {
                        number_of_people[pivot.length - 1]++;
                        continue;
                    }
                    if (pivot[index] < distances[index2] && distances[index2] < pivot[index + 1]) {
                        number_of_people[index]++;
                    }
                }
            }
            for (index = 0, len = pivot.length; index < len - 2; index++) {
                for (index2 = 0, len2 = resign_distances.length; index2 < len2; index2++) {
                    if (pivot[pivot.length - 1] < resign_distances[index2] && resign_distances[index2] < 100) {
                        number_of_people[pivot.length - 1]++;
                        continue;
                    }
                    if (pivot[index] < resign_distances[index2] && resign_distances[index2] < pivot[index + 1]) {
                        number_of_resign_people[index]++;
                    }
                }
            }
            localStorage.setItem('number_of_people', number_of_people);
        localStorage.setItem('number_of_resign_people', number_of_resign_people);
        });
       
</script>
@endsection
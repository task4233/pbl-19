@extends('layouts.app')

@section('title', 'Distance')

@section('content')
<div class="chart">
		<!-- chart.js -->
		<canvas id="ctx"></canvas>
		<!-- end -->
</div>

<script>
 var long1;
 var lat1;
 var long_array = new Array();
 var lat_array = new Array();
 var distances = new Array();
 var resign_distances = new Array();
 var address="3D Center Building, 3 Phố Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam";
 $.ajax({
     type : "GET",
     url : "https://places.cit.api.here.com/places/v1/autosuggest",
     data : {
         at : "0,0",
         q: "3D Center Building, 3 Phố Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam",
         app_id: "WJQVxZR8CSM7ecshD53Z",
         app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
     },
     success : function (data){
         console.log("latitude : "+data['results'][0]['position'][0]);
         console.log("longtitude : "+data['results'][0]['position'][1]);
         long1 = data['results'][0]['position'][0];
         lat1 = data['results'][0]['position'][1];
         // data would be here if loading successfully
         for (var index = 0; index < address_list.length; index++) {
             $.ajax({
                 type : "GET",
                 url : "https://places.cit.api.here.com/places/v1/autosuggest",
                 data : {
                     at : "0,0",
                     q: address_list[index],
                     app_id: "WJQVxZR8CSM7ecshD53Z",
                     app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
                 },
                 success : function (data){
                     if(data['results'][0]){
                         distances.push(getDistanceFromLatLonInKm(parseFloat(lat1),parseFloat(long1),parseFloat(data['results'][0]['position'][1]),parseFloat(data['results'][0]['position'][0])));
                     }
                     
                     // data would be here if loading successfully
                 }
             });
         }
         for (var index = 0; index < resign_address_list.length; index++) {
             $.ajax({
                 type : "GET",
                 url : "https://places.cit.api.here.com/places/v1/autosuggest",
                 data : {
                     at : "0,0",
                     q: resign_address_list[index],
                     app_id: "WJQVxZR8CSM7ecshD53Z",
                     app_code: "jKlH9w7PjRP1pkVwK5-4IQ"
                 },
                 success : function (data){
                     if(data['results'][0]){
                         resign_distances.push(getDistanceFromLatLonInKm(parseFloat(lat1),parseFloat(long1),parseFloat(data['results'][0]['position'][1]),parseFloat(data['results'][0]['position'][0])));
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
             if(pivot[pivot.length-1]<distances[index2]){
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
             if(pivot[pivot.length-1]<resign_distances[index2]){
                 number_of_people[pivot.length-1]++;
                 continue;
             }
             if(pivot[index]<resign_distances[index2] && resign_distances[index2]<pivot[index+1]){
                 number_of_resign_people[index]++;
             }
         }
     }
     console.log("Number of emp : "+number_of_people);
     console.log("Number of resigned : "+number_of_resign_people);
 });
 // get addresses
</script>

</html>
</script>

<h1>Heading Conclusion</h1>
<p>
		write something.
</p>
@endsection

@section('footer')
		(c) 2019 hoge.
@endsection

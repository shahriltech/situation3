<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
//Uber Script
$(document).ready(function(){
            var server_token = "6yloHWIylZaDYof-29p3Saa_N_vk1ngdxsHfCcLG";
            var start_latitude = 3.173015;
            var start_longitude = 101.607116;

            $.get("https://crossorigin.me/https://api.uber.com/v1/estimates/time?server_token="+server_token+"&start_latitude="+start_latitude+"&start_longitude="+start_longitude, function(data){
              console.log(data.times.length);
              for (i = 0; i < data.times.length; i++) { 
              $('#show').append("<font size='5' face='courier'> "+data.times[i].display_name+" </font><br>");
              $('#show').append("<p style='font-size:18px;'>Estimated Time <font class='pull-right'>"+secondsToHms(data.times[i].estimate)+" min<font> </p>");
              $('#show').append("<hr>");
            }
                // alert("Data : " + data.estimate + "status : " + status);
            })
        });

        function secondsToHms(d) {
          d = Number(d);
          var h = Math.floor(d / 3600);
          var m = Math.floor(d % 3600 / 60);
          var s = Math.floor(d % 3600 % 60);
          return ((h > 0 ? h + ":" + (m < 10 ? "" : "") : "") + m); }
</script>
</head>
<body style="background-color:grey">

<div id = "show"></div>
                            

</body>
</html>


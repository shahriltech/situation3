<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.getJSON demo</title>
  <style>
  img {
    height: 100px;
    float: left;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<div id="images"></div>
 
<script>
(function() {
  var flickerAPI = "https://api.uber.com/v1/estimates/time?";
  $.getJSON( flickerAPI, {
    server_token: "yloHWIylZaDYof-29p3Saa_N_vk1ngdxsHfCcLG",
    start_latitude: 3.173015,
    start_longitude: 101.607116
  })
    .done(function( data ) {
      var obj = $.parseJSON(data);
      $("#counter3 .metric").html(obj.display_name);
      $("#counter3 .metric-small").html(obj.estimate);

    });
})();
</script>



<div class="metric"></div>
<div class="metric-small"></div> 
</body>
</html>





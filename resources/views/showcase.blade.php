<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Madlabs Situation Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link media="all" type="text/css" rel="stylesheet" href="{{ asset ('assets/css/bootstrap.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset ('assets/css/controlfrog.css')}}"> 
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	
	<script src="//code.jquery.com/jquery-1.9.1.min.js"></script> 

	<script src="{{asset ('assets/js/moment.js')}}"></script>
	<script src="{{ asset ('assets/js/easypiechart.js')}}"></script>
	<script src="{{ asset ('assets/js/gauge.js')}}"></script>
	<script src="{{ asset ('assets/js/chart.js')}}"></script>
	<script src="{{ asset ('assets/js/jquery.sparklines.js')}}"></script>
	<script src="{{ asset ('assets/js/bootstrap.js')}}"></script>
	<script src="{{ asset ('assets/js/controlfrog-plugins.js')}}"></script>


	<script>
	    jQuery.browser = {};
	    (function () {
	        jQuery.browser.msie = false;
	        jQuery.browser.version = 0;
	        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
	            jQuery.browser.msie = true;
	            jQuery.browser.version = RegExp.$1;
	        }
	    })();
	</script>

	<script src="{{ asset ('assets/js/jquery.jfeed.pack.js')}}"></script>
    

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>

    <!-- <script src="{{ asset ('assets/js/calendar/calendar.js')}}"></script> -->

	<script src="{{ asset ('assets/js/weather.js')}}"></script>
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700,inherit,400" rel="stylesheet" type="text/css">
    
    <script>
    	var themeColour = 'black';
    </script>
	<script src="{{ asset ('assets/js/controlfrog.js')}}"></script>  
    
	<script>		
	var lol=0;

		$(function() {
			setInterval(function(){

				$.get( "{{URL::route('todos.getfeaturedlist')}}" )
				  .done(function( data ) {
				  	for (var i=0;i<9&&i<data.length;i++)
				  	{
				  		var path = "{{URL::action('BigcounterController@getlistsummary')}}"+"/"+data[i].id;
				  		var j=i+1;
				  		path = path.replace("%7Bid%7D",data[i].id)+"?option="+j;
				  		$("#svpheader-"+(i+1)).html("<span></span>"+data[i].name);
				  	  	
				  	  $.get( path )
						  .done(function( data ) {
						  	var obj = $.parseJSON(data);
						  	var svp = "svp-"+obj.optioncount;				  	
							cf_rSVPs[svp].chart.update(obj.percentDone);				
							$('#'+svp+' .chart').data('percent', obj.percentDone);
							$('#'+svp+' .metrics').find('.metric').html(obj.percentDone);
							$('#'+svp+' .timeupdate').text("Last update: "+ obj.latesttimestamp);
						  });

				  	}				  	


				  });

				$.get( "{{URL::route('bigbutton.gettowtruckdetails')}}" )
				  .done(function( data ) {
				  	var obj = $.parseJSON(data);
				  	//alter the color red and green
				  	 $("#counter2 .change").removeClass("m-green m-red");
				  	if (obj.isplus)				  		
				  		$("#counter2 .change").addClass("m-green");
				  	else
				  		$("#counter2 .change").addClass("m-red");

					 $("#counter2 .metric").html(obj.countercount);
					 $("#counter2 .metric-small .large").html(obj.percent);
					 $('#counter2 .timeupdate').text("Last update: "+ obj.latesttimestamp);

				  });

				  $.get( "{{URL::route('bigbutton.getcounterdetails')}}" )
				  .done(function( data ) {
				  	var obj = $.parseJSON(data);
				  	//alter the color red and green
				  	 $("#counter1 .change").removeClass("m-green m-red");
				  	if (obj.isplus)				  		
				  		$("#counter1 .change").addClass("m-green");
				  	else
				  		$("#counter1 .change").addClass("m-red");				  	 
					 $("#counter1 .metric").html(obj.countercount);
					 $("#counter1 .metric-small .large").html(obj.percent);
					 $('#counter1 .timeupdate').text("Last update: "+ obj.latesttimestamp);

				  });
	
			}, 3000);	  		  			  		

			jQuery.getFeed({
	        	url: "{{URL::route('testfeed')}}",
		        success: function(feed) {            		            
		            $("#rssfeed").empty();
		            for(var i = 0; i < feed.items.length; i++) {
		            	var item = feed.items[i];

		            	var strfeed='<div class="item"><blockquote class="twitter-tweet" lang="en"><p>'+item.title+' - '+item.description+'</p></blockquote></div>';		            	
		                $("#rssfeed1").append(strfeed);
		                
		            }
		            $(".item img").remove();
		            
		            //jQuery('#result').append(html);
	        	}    
	    	});				

		});

        </script>
    
    <style>
        
        .holiday{
            
            background-color:#2b2b2b;
            color: darkgrey;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        
        /*.change1,.change2 {display:none;}*/

    </style>	
    
</head>
    
    
<body class="black">
	<div class="cf-container cf-nav-active">

		<div class="row">
			<div class="col-sm-6 cf-item" style="width:50%">
                <div class="inner">
                    
                    <div class="col-sm-4 cf-item" style="width:60%">
                        <header>
                            <p class="glyphicon glyphicon-cloud"> Weather</p>
                        </header>
                        
                        <div class="content col-md-12"> 
                            <div class="col-md-5">
                                <div class="cf-td cf-td-12">
                                    <div class="cf-td-time" style="font-size:50px; color:#FFFFFF;">12:00</div>
                                    <div class="cf-td-dd">
                                        <p class="cf-td-day metric-small">Monday</p>
                                        <p class="cf-td-date metric-small">1st October, 2013</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">                       
                                <h3 class="location"><span id="location">Unknown</span></h3>
                                <table style="width:300px;">
                                    <thead>
                                        <th style="width:150px;">
                                            <!-- Cloud Icon -->
                                            <center><img id="icon" width="100px;" height="100px;" src="{{ asset ('assets/img/codes/200.png') }}"/></center>
                                        </th>
                                        <th style="width:150px;">
                                            <!-- Humidity -->
                                            <center><img width="100px;" height="100px;" src="{{ asset ('assets/img/Droplet.svg') }}" height="16px" /></center>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><!-- Temperature -->
                                                <center><p class="temperature"><span id="temperature">0</span>&deg;</p></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <span id="humidity">0</span>%
                                                    <br />
                                                    <span id="wind"></span><span id="direction"></span>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <img src="../../img/weather.png" style="height:150px; witdh:150px;" />
                            <img src="../../img/thermometer-512.png" style="height:150px; witdh:150px;" /> -->
                            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                            <div class="col-sm-6 cf-item" >
                                <header>
                                       <p class="glyphicon glyphicon-bell" style="text-align:center;"> Ron Status </p>
                                   </header>
                                <div class="content" style="padding-top:50px; text-align:center;">
                                    <div class="cf-svmc" id="counter1"> 
                                        <div class="change metric" style="font-size:70px;">-</div>
                                        <p class="timeupdate">Last update: loading</p>
                                    </div>
                                </div>
                            </div>	
                            <div class="col-sm-6 cf-item">
                                <header>
                                       <p class="glyphicon glyphicon-bell" style="text-align:center;"> Tow Truck Status </p>
                                   </header>
                                <div class="content" style="padding-top:50px; text-align:center;">
                                    <div class="cf-svmc" id="counter2"> 
                                        <div class="change metric" style="font-size:70px;">-</div>
                                        <p class="timeupdate">Last update: loading</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- //end cf-item -->
                    
                    <div class="col-sm-4 cf-item" style="width:40%">
						<header>
							<p class="glyphicon glyphicon-plane"> UBER CAR </p>
						</header>
						<div class="content">
                            <div id='content'>
				                <div id = "result"></div>
							</div>
						</div>
					</div> <!-- //end cf-item -->
				</div> <!-- //end inner -->

                
                <div class="row" style="padding-top:60px;">
                    <div class="col-md-12 change1">
                        <!--1th Progress Section -->
                        <div class="col-sm-3 cf-item change1">
                            <header>
                                <p id="svpheader-1" class="#">None </p>
                            </header>
                            <div class="content cf-svp clearfix" id="svp-1">
                                <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                                <div class="metrics">
                                    <span class="metric" style="font-size:40px;">0</span>
                                    <span class="metric-small" style="#">%</span>
                                </div>		
                                <br>
                                <p class="timeupdate">Last update: loading</p>											
                            </div>
                        </div> <!-- //end cf-item -->

                        <!-- 2th Progress Section -->
                        <div class="col-sm-3 cf-item change1">
                            <header>
                                <p id="svpheader-2" class="glyphicon glyphicon-briefcase"> NONE</p>
                            </header>
                            <div class="content cf-svp clearfix" id="svp-2">
                                <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                                <div class="metrics">
                                    <span class="metric" style="font-size:40px;">0</span>
                                    <span class="metric-small" style="#">%</span>
                                </div>		
                                <br>
                                <p class="timeupdate">Last update: loading</p>											
                            </div>
                        </div> <!-- //end cf-item -->

                        <!-- 3th Progress Section -->
                        <div class="col-sm-3 cf-item change1">
                            <header>
                                <p id="svpheader-3" class="glyphicon glyphicon-briefcase"> NONE</p>
                            </header>
                            <div class="content cf-svp clearfix" id="svp-3">
                                <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                                <div class="metrics">
                                    <span class="metric" style="font-size:40px;">0</span>
                                    <span class="metric-small" style="#">%</span>
                                </div>	
                                <br>
                                <p class="timeupdate">Last update: loading</p>					
                            </div>
                        </div> <!-- //end cf-item -->

                        <!-- 4th Progress Section -->
                        <div class="col-sm-3 cf-item change1">
                            <header>
                                <p id="svpheader-4" class="glyphicon glyphicon-briefcase"> NONE</p>
                            </header>
                            <div class="content cf-svp clearfix" id="svp-4">
                                <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                                <div class="metrics">
                                    <span class="metric" style="font-size:40px;">0</span>
                                    <span class="metric-small" style="#">%</span>
                                </div>
                                <br>
                                <p class="timeupdate">Last update: loading</p>													
                            </div>						
                        </div> <!-- //end cf-item --> 
                    </div>
                </div> <!-- // end row -->
            </div> <!-- //end col -->
			
			<div class="col-sm-6 cf-item" style="width:50%;">
                <div class="inner">
                       <div class="row">
                       <div class="col-sm-4 cf-item" style="width:45%">
                        <header>
                            <p class="glyphicon glyphicon-plane"> PUBLIC HOLIDAY </p>
                        </header>
                        <div class="content">
                            <div id='content'>
                                <p id='public'></p>
                            </div>
                        </div>
                    </div> <!-- //end cf-item -->	

                       <!-- Annual Leave Section -->
                    <div class="col-sm-4 cf-item" style="width:45%">
                        <header>
                            <p class="glyphicon glyphicon-plane"> ANNUAL LEAVE </p>
                        </header>
                        <div class="content">
                            <div id='content'>
                                <p id='annual'></p>
                            </div>
                        </div>
                    </div> <!-- //end cf-item -->
                    </div><!-- //end row -->
                </div> <!-- //end inner -->
                
              
			<div class="row" style="padding-top:60px;">
                <div class="col-md-12 change2">
                    <!--1th Progress Section -->
                    <div class="col-sm-3 cf-item change2">
                        <header>
                            <p id="svpheader-5" class="glyphicon glyphicon-briefcase">None </p>
                            </header>
                        <div class="content cf-svp clearfix" id="svp-5">
                            <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                            <div class="metrics">
                                <span class="metric" style="font-size:40px;">0</span>
                                <span class="metric-small" style="#">%</span>
                            </div>		
                            <br>
                            <p class="timeupdate">Last update: loading</p>											
                        </div>
                    </div> <!-- //end cf-item -->

                    <!-- 2th Progress Section -->
                    <div class="col-sm-3 cf-item change2">
                        <header>
                            <p id="svpheader-6" class="glyphicon glyphicon-briefcase"> NONE</p>
                        </header>
                        <div class="content cf-svp clearfix" id="svp-6">
                            <div style="" class="chart" data-percent="0" data-layout="l-6-4"></div>
                            <div class="metrics">
                                <span class="metric" style="font-size:40px;">0</span>
                                <span class="metric-small" style="#">%</span>
                            </div>		
                            <br>
                            <p class="timeupdate">Last update: loading</p>											
                        </div>
                    </div> <!-- //end cf-item -->

                    <!-- 3th Progress Section -->
                    <div class="col-sm-3 cf-item change2">
                        <header>
                            <p id="svpheader-7" class="glyphicon glyphicon-briefcase"> NONE</p>
                        </header>
                        <div class="content cf-svp clearfix" id="svp-7">
                            <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                            <div class="metrics">
                                <span class="metric" style="font-size:40px;">0</span>
                                <span class="metric-small" style="#">%</span>
                            </div>	
                            <br>
                            <p class="timeupdate">Last update: loading</p>					
                        </div>
                    </div> <!-- //end cf-item -->

                    <!-- 4th Progress Section -->
                    <div class="col-sm-3 cf-item change2">
                        <header>
                            <p id="svpheader-8" class="glyphicon glyphicon-briefcase"> NONE</p>
                        </header>
                        <div class="content cf-svp clearfix" id="svp-8">
                            <div class="chart" data-percent="0" data-layout="l-6-4"></div>
                            <div class="metrics">
                                <span class="metric" style="font-size:40px;">0</span>
                                <span class="metric-small" style="#">%</span>
                            </div>
                            <br>
                            <p class="timeupdate">Last update: loading</p>													
                        </div>						
                    </div> <!-- //end cf-item -->
                </div>      
			</div> <!-- // end row -->  
		</div> <!-- //end col -->
        </div>
        
		<footer style="height:100%">
			<br><br><br>		
			<p><i>(C) Mad Labs Sdn Bhd</i></p>
		</footer>
		
	</div> <!-- //end container -->


    <script>
         
//        var slideIndex = 0;
//        carousel();
//
//        function carousel() {
//            var i;
//            var x = document.getElementsByClassName("mySlides");
//            for (i = 0; i < x.length; i++) {
//              x[i].style.display = "none";
//            }
//            slideIndex++;
//            if (slideIndex > x.length) {slideIndex = 1}
//            x[slideIndex-1].style.display = "block";
//            setTimeout(carousel, 2000);
//        }
        
<<<<<<< HEAD
=======
        var slideIndex = 0;
        carousel();
       
        function carousel() {
            
            
            if(slideIndex == 0){
                console.log("hide2");
                $('.change2').css('display','none');
                $('.change1').css('display','block');
                slideIndex++;
            }else if(slideIndex > 0){
                console.log("hide1");
                $('.change1').css('display','none');
                $('.change2').css('display','block');
                 slideIndex--;
            }

            
            
                setTimeout(carousel, 4000);
            }
    
           
           
>>>>>>> 90ebc1cdb28152bebc3868d126f81f6fe993f9e3
        
        
//        var slideIndex = 0;
//        carousel();
//       
//        function carousel() {
//            
//            
//            if(slideIndex == 0){
//                console.log("hide2");
//                $('.change2').css('display','none');
//                $('.change1').css('display','block');
//                slideIndex++;
//            }else if(slideIndex > 0){
//                console.log("hide1");
//                $('.change1').css('display','none');
//                $('.change2').css('display','block');
//                 slideIndex--;
//            }
//
//            
//            
//                setTimeout(carousel, 4000);
//            }
    
    </script>
<script>
      function pubholiday(){
        $.ajax({
          url: "{{ url('/publicholiday')}}",
          cache: false,
          success: function(data){
             $("#public").html(data);
          } 
        });
      }
      function annual_leave(){
        $.ajax({
          url: "{{ url('/annualleave')}}",
          cache: false,
          success: function(data){
             $("#annual").html(data);
          } 
        });
      }
    function uber_car(){
        $.ajax({
          url: "{{ url('/ubercar')}}",
          cache: false,
          success: function(data){
             $("#result").html(data);
          } 
        });
      }
      $(document).ready(function(){
        uber_car();
        pubholiday();
        annual_leave(); //Call auto_load() function when DOM is Ready
 
      });
 
      //Refresh auto_load() function after 10000 milliseconds
      setInterval(function(){
        uber_car();
      },3000);

      setInterval(function(){
        pubholiday();
        annual_leave();
      },10000)
   </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Madlabs Situation Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link media="all" type="text/css" rel="stylesheet" href="{{ asset ("assets/css/bootstrap.css") }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset ("assets/css/controlfrog.css")}}">  
	
	<script src="//code.jquery.com/jquery-1.9.1.min.js"></script> 

	<script src="{{asset ("assets/js/moment.js")}}"></script>
	<script src="{{ asset ("assets/js/easypiechart.js")}}"></script>
	<script src="{{ asset ("assets/js/gauge.js")}}"></script>
	<script src="{{ asset ("assets/js/chart.js")}}"></script>
	<script src="{{ asset ("assets/js/jquery.sparklines.js")}}"></script>
	<script src="{{ asset ("assets/js/bootstrap.js")}}"></script>
	<script src="{{ asset ("assets/js/controlfrog-plugins.js")}}"></script>


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

	<script src="{{ asset ("assets/js/jquery.jfeed.pack.js")}}"></script>
    

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>

    <script src="{{ asset ("assets/js/calendar/calendar.js")}}"></script>

	<script src='https://apis.google.com/js/client.js?onload=handleClientLoad'></script>

	<script src="{{ asset ("assets/js/weather.js")}}"></script>
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700,inherit,400" rel="stylesheet" type="text/css">
    
    <script>
    	var themeColour = 'black';
    </script>

	<script src="{{ asset ("assets/js/controlfrog.js")}}"></script>   
	<script>		
	var lol=0;

		$(function() {
			setInterval(function(){

				$.get( "{{URL::route('todos.getfeaturedlist')}}" )
				  .done(function( data ) {
				  	for (var i=0;i<4&&i<data.length;i++)
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
                        <div class="content">
                            <div class="cf-td cf-td-12">
                                <div class="cf-td-time metric">12:00</div>
                                <div class="cf-td-dd">
                                    <p class="cf-td-day metric-small">Monday</p>
                                    <p class="cf-td-date metric-small">1st October, 2013</p>
                                </div>
                            </div>
                            <!-- <img src="../../img/weather.png" style="height:150px; witdh:150px;" />
                            <img src="../../img/thermometer-512.png" style="height:150px; witdh:150px;" /> -->
                            <h3 class="location"></h3>
                            <table>
                                <thead>
                                    <th>
                                        <div class="climate_bg"></div>
                                        <center><strong class="temperature"></strong></center>
                                    </th>
                                    <th>
                                        <img class="dropicon" src="{{ asset ("assets/img/Droplet.svg") }}">
                                        <br />
                                        <center><strong class="humidity"></strong></center>
                                    </th>
                                    <th>
                                        <img class="windicon" src="{{ asset ("assets/img/Wind.svg") }}">
                                        <center><div class="windspeed"></div></center>
                                    </th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 cf-item" style="width:30%">
						<header>
							<p class="glyphicon glyphicon-plane"> UBER CAR </p>
						</header>
						<div class="content">
                            <div id='content'>
							    
							</div>
						</div>
					</div> <!-- //end cf-item -->
                    
				</div> <!-- //end inner -->
                
                
                    <div class="row">
                        <!--1th Progress Section -->
                        <div class="col-sm-3 cf-item">
                            <header>
                                <p id="svpheader-1" class="glyphicon glyphicon-briefcase">None </p>
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
                        <div class="col-sm-3 cf-item">
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
                        <div class="col-sm-3 cf-item">
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
                        <div class="col-sm-3 cf-item">
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
                    </div> <!-- // end row -->
                </div> <!-- //end col -->
			
			 <div class="col-sm-6 cf-item" style="width:50%">
				<div class="inner">
                    <div class="row">
				    <div class="col-sm-4 cf-item" style="width:45%">
						<header>
							<p class="glyphicon glyphicon-plane"> PUBLIC HOLIDAY </p>
						</header>
						<div class="content">
                            <div id='content'>
							    <p id='events'></p>
							</div>
						</div>
					</div> <!-- //end cf-item -->	

                    <!-- Annual Leave Section -->
					<div class="col-sm-4 cf-item" style="width:45%">
						<header>
							<p class="glyphicon glyphicon-plane"> ANNUAL LEAVE </p>
						</header>
						<div class="content">
						<br />
							@foreach ($employee as $emp)
									<font class="cf-td-day metric-small holiday"> {{ $emp->name }} </font><span class="pull-right cf-td-day metric-small holiday">{{ $emp->day }}</span>
							<hr />
						<!-- <div class="content">
                            <br />
                            <font class="cf-td-day metric-small holiday"> WORKER 1 </font><span class="pull-right cf-td-day metric-small holiday">2/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 2 </font><span class="pull-right cf-td-day metric-small holiday">2/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 3 </font><span class="pull-right cf-td-day metric-small holiday">12/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 4 </font><span class="pull-right cf-td-day metric-small holiday">16/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 5 </font><span class="pull-right cf-td-day metric-small holiday">12/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 6 </font><span class="pull-right cf-td-day metric-small holiday">16/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 7 </font><span class="pull-right cf-td-day metric-small holiday">12/9/2016</span>
                            <hr />
                            <font class="cf-td-day metric-small holiday"> WORKER 8 </font><span class="pull-right cf-td-day metric-small holiday">16/9/2016</span>
                            <hr />
						</div> -->

				            @endforeach      
						</div>
					</div> <!-- //end cf-item -->
					</div><!-- //end row -->
				</div> <!-- //end inner -->
                
                
				<div class="row">
                    <div class="col-sm-2 cf-item"></div> <!-- //end cf-item -->
					<div class="col-sm-4 cf-item">
						<header>
                            <p class="glyphicon glyphicon-bell" style="text-align:center;"> Ron Status </p>
                        </header>
						<div class="content" style="padding-top:50px; text-align:center;">
							<div class="cf-svmc" id="counter1"> 
								<div class="change metric">-</div>
								<p class="timeupdate">Last update: loading</p>
							</div>
						</div>
				    </div> <!-- //end cf-item -->	
					<div class="col-sm-4 cf-item">
						<header>
                            <p class="glyphicon glyphicon-bell" style="text-align:center;"> Tow Truck Status </p>
                        </header>
						<div class="content" style="padding-top:50px; text-align:center;">
							<div class="cf-svmc" id="counter2"> 
								<div class="change metric">-</div>
								<p class="timeupdate">Last update: loading</p>
							</div>
						</div>
				    </div> <!-- //end cf-item -->
                    <div class="col-sm-2 cf-item"></div> <!-- //end cf-item -->
				</div> <!-- // end row -->
                
			</div> <!-- //end col -->
		</div>
        
		<footer style="height:100%">
			<br><br><br>		
			<p><i>(C) Mad Labs Sdn Bhd</i></p>
		</footer>
		
	</div> <!-- //end container -->


</body>
</html>
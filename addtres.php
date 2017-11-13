<?php
require 'secure.php';

?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
      #map-canvas {
         /*width: 1200px; */
         width: 100%;
        height: 600px; 
      
		background-color: #CCC;

      }
    </style>
	 
	 
  </head>
  <body>
  	
  	

   <?php 
  require 'nav.php';
 ?>
  
<div class="row">
    

   
    <div class="col-md-9">
    	<div class="act1">
     
     <div id="map-canvas"></div>
     	</div>
      </div>
      
      <div class="col-md-3">
     
     <div>
     	
     	<form action="savetres.php" method="get">

	  		<div class="form-group">
	   		 <label for="">Latitude</label>
	    	<input type="text" name="lat" class="form-control" required="required" id="lat" placeholder="Lat">
	  		</div>

	  		<div class="form-group">
	    	<label for="">Longtitude</label>
	    	<input type="text" name="lng" class="form-control" required="required" id="lng" placeholder="Long">
	  		</div>
	  
	  		<button type="submit" class="btn btn-lg btn-success">Save</button>

		</form>


     </div>
     
      
      
      </div>
   
         
      </div>

   
<script>

	 function hereDoc(f) {
		  return f.toString().
		      replace(/^[^\/]+\/\*!?/, '').
		      replace(/\*\/[^\/]+$/, '');
		}
		
		function initMap() {
			
			var lat = 31.507792;
			var lng = 35.090945;

			
			var mapCanvas = document.getElementById('map-canvas');
			var mapOptions = {
			  center: new google.maps.LatLng(lat, lng),
			  zoom: 18,
			  mapTypeId: google.maps.MapTypeId.HYBRID
			}
			var map = new google.maps.Map(mapCanvas, mapOptions);
				
		

		google.maps.event.addListener(map, 'click', function(event) {
   			placeMarker(event.latLng);
		});

		function placeMarker(location) {
   			 var marker = new google.maps.Marker({
        position: location, 
        map: map
   		 });
        document.getElementById("lat").value = location.lat();
        document.getElementById("lng").value = location.lng();

		}
	
		google.maps.event.addDomListener(window, 'load', initMap);
		
		}
		
	</script>

	

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ1hEdxXSwg5bK8X_iJQNFZq2kDMnoxmI&callback=initMap"async defer></script>
  
 </body>
</html>
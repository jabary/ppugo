<?php

require 'secure.php';
require 'MyDb.php';

$mydb = new MyDb();

	$rows = $mydb->getAllTres();
	
	$list = "";
	foreach ($rows as $row ){
		if($list != "")
			$list .=",";
		$list.="[" .$row['id']. "," .$row['latitude'].",". $row['longitude']."]";	
	}

	?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
width: 100%;
height: 600px;
background-color: #CCC;

}
</style>

<script>
function initialize() {


var content = "Testing !!!";


var list = [<?php echo $list ?>];


var mapCanvas = document.getElementById('map-canvas');
var mapOptions = {
				center: new google.maps.LatLng(31.534847, 35.098426),
				zoom: 14,
				mapTypeId: google.maps.MapTypeId.HYBRID
				 };
var map = new google.maps.Map(mapCanvas, mapOptions);


var i=0,li=list.length;
	while(i<li){
		var myLatLng = new google.maps.LatLng(list[i][1],list[i][2]);
		var markerContent = list[i][0] + "</br>" + "Lat: "+list[i][1] + "</br>Lng: " + list[i][2];
		addMarker(myLatLng,markerContent,map);	
		i++;
	}

}

function addMarker(latlng,content,map){
var infoWindow = new google.maps.InfoWindow({
content : content
});

var iconBase = 'http://maps.google.com/mapfiles/kml/pal3/';
var marker = new google.maps.Marker({
position: latlng,
map: map,
icon: 'logo.png'
});

google.maps.event.addListener(marker, 'click', function() {
infoWindow.open(map,marker);
});
}


google.maps.event.addDomListener(window, 'load', initialize);


</script>
</head>
<body>
 <?php 
 require 'nav.php';
 ?>
  
<div class="row">
    

   
    <div class="col-md-12">
      <div class="act1">
     
     <div id="map-canvas"></div>
     
      
      </div>
      </div>
      
   
      
           
      </div>
   


<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ1hEdxXSwg5bK8X_iJQNFZq2kDMnoxmI&callback=initialize"async defer></script>


</body>
</html>

<?php

$x= $_GET['x'];

$y=$_GET['y'];
require 'MyDb.php';

$db = new MyDb();

$locations= $db->getNearByLocations($x,$y);

echo json_encode($locations);

?>
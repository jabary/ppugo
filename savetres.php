<?php
require 'secure.php';

require 'MyDb.php';

$mydb = new MyDb();

$lat = $_GET['lat'];
$lng = $_GET['lng'];

$mydb->addTres($lat,$lng);

header("location:index.php");
?>
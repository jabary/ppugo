<?php
require 'secure.php';

if(is_numeric($_GET['id'])){
require 'MyDb.php';

$mydb = new MyDb();

$id = $_GET['id'];

$result = $mydb->deleteTres($id);

header("location: allTres.php");


}





?>
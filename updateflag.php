<?php
require 'MyDb.php';

$mydb = new MyDb();
if(is_numeric($_GET['id'])){

	$id = $_GET['id'];
	$player_id = $_GET['player_id'];

	$result = $mydb->updateFlag($id,$player_id);
	
	if($result){
		echo "updated";
	}
	else{
		echo "fail";
	}

}



?>
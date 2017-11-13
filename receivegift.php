<?php
require 'secure.php';
require 'MyDb.php';

$mydb = new MyDb();
if(is_numeric($_GET['id'])){

	$id = $_GET['id'];

	$result = $mydb->receiveGift($id);
	
	if($result){
		header("location:winners.php");
		echo "updated";
	}
	else{
		echo "fail";
	}

}



?>
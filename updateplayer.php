<?php
require 'MyDb.php';

$mydb = new MyDb();
if(is_numeric($_GET['id'])){

	$id = $_GET['id'];

	$result = $mydb->updatePlayer($id);
	
	if($result){
		echo "updated";
	}
	else{
		echo "fail";
	}

}



?>
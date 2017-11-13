<?php
require 'secure.php';

require 'MyDb.php';

$mydb = new MyDb();
if(is_numeric($_GET['id'])){

	$id = $_GET['id'];

	$result = $mydb->revertFlag($id);
	
	if($result){
		echo "updated";
		header("location:allTres.php");
	}
	else{
		echo "fail";
	}

}



?>
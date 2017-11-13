<?php

require 'MyDb.php';

$name = $_POST['name'];
$mobile = $_POST['mobile'];

if(strlen($name)<50 && strlen($mobile)<=10 && is_numeric($mobile)){

$mydb = new MyDb();

$result = $mydb->addPlayer($name,$mobile);
if($result){
	echo $result;
}
else{
	echo "failed to save";
}

}

?>
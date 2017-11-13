<?php
 session_start();
 $username = $_POST['username'];
 $password = $_POST['password'];

 //echo "Password: " . $password;

 //require 'MyDB.php';

 if($username == "ppugo" && $password == "3rdeye"){
 	$_SESSION['username'] = $username;
 	header("location:index.php");
 }
 else{
 	header("location:login.php?error=1");
 }

 /*$db = new MyDb();

 		if($db->login($username,$password)){
 			
 			setcookie("username",$username,time()+ 1000);
 			header("location:index.php");

 			echo "Welcome";
 		}
 		else{
 			header("location:login.php?error=1");
 		}

 		*/



?>
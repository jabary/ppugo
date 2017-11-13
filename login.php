<?php

if(isset($_GET['error'])){
	if($_GET['error']==1){
		echo "Invalid username or password, please try again";
	}
}


?>

<form action='check.php' method='post'>
	Username: <input type='text' name='username'> <br>
	Password: <input type='password' name='password'> <br>

	<input type='submit' value='login' name='submit'>

</form>
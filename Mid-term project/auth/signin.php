<h1>Sign In</h1>
<?php
require_once('auth.php');
session_start();

// if the user is alreay signed in, redirect them to the members_page.php page
if(is_logged()) header('location: ../index.php');

// use the following guidelines to create the function in auth.php
//instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	signin();
	/*
	echo 'check email+password';
	if(true){
		$_SESSION['logged']=true;
		
	}else $_SESSION['logged']=false;
	*/
}

// improve the form
?>
<form method="POST">
	<input type="email" name="email" />
	<input type="password" name="password" />

	<input type="submit" value="submit" />
</form>
<br>
<a href="../public_index.php"><button>Go back to index</button></a>

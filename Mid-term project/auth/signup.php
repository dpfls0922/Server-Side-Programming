<h1>Sign Up</h1>
<?php
require_once('auth.php');
session_start();

// if the user is alreay signed in, redirect them to the members_page.php page
if(is_logged()) header('location: ../index.php');

// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	$state = true;

	// check if the fields are empty
	if (!isset($_POST['email']) || !isset($_POST['password'])){
		echo 'Check your email or password.<br>';
		$state=false;
	}

	// check if the email is valid
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		echo 'Your email is invalid.<br>';
		$state = false;
	}
	
	// check if password length is between 8 and 16 characters
	if(strlen($_POST['password'])<8 || strlen($_POST['password']) > 16){
		echo 'Password should be min 8 characters and max 16 characters.<br>';
		$state = false;
	}

	// check if the password contains at least 2 special characters
	$scarray = array("!", "?", "~", "/", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "-", "=", ":", ";", "'", "\"", ",", ".", "<", ">", "`");
	$specialChars = preg_match('@[^\w]@', $_POST['password']);
	$removedStr = str_replace($scarray, '', $_POST['password']);
	$cnt = strlen($_POST['password'])-strlen($removedStr);
	
	if(!$specialChars || $cnt < 2){
		echo 'Password should contain at least two special characters.<br>';
		$state = false;
	}

	// check if the file containing banned users exists
	$exist_bannedusers=false;
	if(file_exists('../data/banned.csv.php')) $exist_bannedusers=true;

	// check if the email has not been banned
	$error='';
	if($exist_bannedusers){
		$fh=fopen('../data/banned.csv.php', 'r');
		while($line=fgets($fh)){
			if($_POST['email']==trim($line)){
				// found the banned users
				$error='It is a banned user.<br>';
				$state=false;
			};
		}
		fclose($fh);
	}
	if(strlen($error)>0) echo $error;
		
	// check if the file containing users exists
	if(file_exists('../data/users.csv.php')){
		$fh=fopen('../data/users.csv.php', 'r');
		// check if the email is in the database already
		while($line=fgets($fh)){
			$line=trim($line);
			$line=explode(';', $line);
			if($line[0]==$_POST['email']){
				echo 'This email is already registered<br>';
				$state=false;
			}
		}
		fclose($fh);
	}

	// store the information
	if($state){
		// encrypt password
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		// save the user in the database
		$fh=fopen('../data/users.csv.php', 'a+');
    	fputs($fh, $_POST['email'].';'.$password.PHP_EOL);
		fclose($fh);
		
		// show them a success message and redirect them to the sign in page
    	echo 'You created your account. Sign in please';
		header('location: signin.php');
	}
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

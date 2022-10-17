<?php

// add parameters
function signup(){
	// add the body of the function based on the guidelines of signup.php
	
}

// add parameters
function signin(){
	// add the body of the function based on the guidelines of signin.php
	$state=true;

	// 1. check if email and password have been submitted
	if (!isset($_POST['email']) || !isset($_POST['password'])){
		echo 'Check your email or password.<br>';
		$state=false;
	}
	
	// 2. check if the email is well formatted
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		echo 'Your email is invalid.<br>';
		$state=false;
	}
	
	// 3. check if the password is well formatted
	if(strlen($_POST['password'])<8 || strlen($_POST['password'])>16) $state = false;

	$scarray = array("!", "?", "~", "/", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "-", "=", ":", ";", "'", "\"", ",", ".", "<", ">", "`");
	$specialChars = preg_match('@[^\w]@', $_POST['password']);
	$removedStr = str_replace($scarray, '', $_POST['password']);
	$cnt = strlen($_POST['password'])-strlen($removedStr);
	
	if(!$specialChars || $cnt < 2)	$state = false;
	
	// 4. check if the file containing banned users exists
	$exist_bannedusers=false;
	if(file_exists('../data/banned.csv.php')) $exist_bannedusers=true;

	// 5. check if the email has been banned
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

	// 6. check if the file containing users exists
	if($state){
		$eror='';
		$exist_email=false;
		if(file_exists('../data/users.csv.php')){
			$fh=fopen('../data/users.csv.php', 'r');
			while($line=fgets($fh)){
				$line=trim($line);
				$line=explode(';', $line);
				// 7. check if the email is registered
				if($line[0]==$_POST['email']){
					$exist_email=true;
					// 8. check if the password is correct
					if(password_verify($_POST['password'], $line[1])){
						// 9. store session information
						$_SESSION['logged']=true;
						$_SESSION['email']=$line[0];
						echo 'success';
						// 10. redirect the user to the members_page.php page
						header('location: ../index.php');
					 } else $error='Not today: Incorrect password<br>';
				}
			}
			if(!$exist_email) $error='Not today: Check your email<br>';
			if(strlen($error)>0) echo $error;
			fclose($fh);
		}
	}
}

function signout(){
	// add the body of the function based on the guidelines of signout.php
	unset($_SESSION['logged']);
	session_destroy();
	// redirect the user to the public page.
	header('location: ../public_index.php');
}

function is_logged(){
	// check if the user is logged
	if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
		return true;
	else return false;
	//return true|false
}
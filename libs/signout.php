<?php
//signout
require_once('../settings.php');
if(count($_SESSION)>0 && is_numeric($_SESSION['userdata']['user_id'])){
	require_once('auth.php');
	signout();
}
header('location: http://localhost/nku/Server-Side%20Programming/Final%20project/index.php');
die();
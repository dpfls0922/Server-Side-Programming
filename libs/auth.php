<?php

//auth.php

function is_login(){
	$is_login=false;
	if(count($_SESSION)>0 && is_numeric($_SESSION['userdata']['user_id'])) $is_login=true;
	return $is_login;
}

function signup($connection,$username,$email,$password,$password2,$mobile,$role,$cartype){

	$errors=array();
	if ($password != $password2) {
		$errors[] = array('input'=>'password','msg'=>'password should be same');
		echo '<p class="bg-danger text-center">password should be same</p>';
		return false;
	}
	if($role=='as Driver' && $cartype==NULL){
		$errors[] = array('input'=>'role','msg'=>'you should enter the cartype');
		echo '<p class="bg-danger text-center">you should enter the cartype</p>';
		return false;
	}

	if ($password == $password2) {
		$query=$connection->prepare('SELECT * FROM users WHERE email=?');
		$query->execute([$email]);

		if($query->rowCount()>0) {
			$errors[] = array('input' => 'result', 'msg' => 'Username already exists');
			echo '<p class="bg-danger text-center">E-mail id already registered</p>';
			return false;
		}
		
		if($role=='as Driver') $role=1;
		else {$role=0; $cartype=0;}
		
		$query=$connection->prepare('INSERT INTO users(name,email,password,mobile,role,car_type) VALUES(?,?,?,?,?,?)');
		$query->execute([$username,$email,password_hash($password,PASSWORD_DEFAULT),$mobile,$role,$cartype]);

		if($role==1){
			$query=$connection->prepare('INSERT INTO cars(car_type,driver_name,is_available) VALUES(?,?,?)');
			$query->execute([$cartype,$username,1]);
		}

		return true;
	}
}

function signin($connection,$email,$password){
	$query=$connection->prepare('SELECT * FROM users WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()==0) return false;
	$result=$query->fetch();
	
	if(!password_verify($password,$result['password'])) return false;
	$_SESSION['userdata'] = array('user_id'=>$result['ID'],'username'=>$result['name'],'is_admin'=>$result['is_admin']);
	if ($result['is_admin']==1) header('Location: http://localhost/nku/Server-Side%20Programming/Final%20project/admin.php');
	return true;
}

function signout(){
	$_SESSION=[];
	session_destroy();
}
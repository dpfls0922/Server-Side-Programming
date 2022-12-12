<?php
//sign in
require_once('../settings.php');
if(count($_SESSION)>0 && is_numeric($_SESSION['userdata']['user_id'])){
	header('location: ../index.php');
	die();
}
?>
<!doctype>
<html>
<head>
	<title>Access your account</title>
</head>
<body>
<?php

if(count($_POST)>0){
	require_once('auth.php');
	if(signin($connection,$_POST['email'],$_POST['password'])){
		header('location: http://localhost/nku/Server-Side%20Programming/Final%20project/index.php');
		die();
	}else echo 'Signin failed';
}
?>

<body>
	<div id="wrapper">

	<div id="bg" class="pt-2 pb-2">
    <h1 class="text-center mt-lg-5 pt-lg-5 mt-sm-0 pt-sm-0 font-weight-bold">Ced<span class="gree">Cab</span></h1>

    <section class="container-fluid box col-lg-10 col-sm-10 col-xs-12 col-md-7  pt-lg-4 mt-lg-4 pt-sm-0 mt-sm-0 mb-5 pb-3 pt-2">
      <div class="text-center">
        <h4 class="font-weight-bold">Sign in</h4>
      </div>
        <form method="POST">

		<div class="form-group  row feilds ">
        <label class="col-sm-2">E-MAIL</label>
            <input name="email" type="email" class="form-control-plaintext col-sm-10 arro" id="email" placeholder="Enter your E-mail" required>
		</div>
		
		<div class="form-group  row feilds ">
              <label class="col-sm-2"  for="password">PASSWORD</label>
              <input name="password" type="password" class="form-control-plaintext col-sm-10 arro" id="password" placeholder="Enter Password" required>
		  </div>
		  
		  <div class="form-group ">
                <input type="submit" class="btn green btn-primary btn-lg btn-block" id="login" name="submit" value="Sign in">
            </div>
        </form>
    </section>
    </div>
  </div>
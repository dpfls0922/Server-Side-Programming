<?php
require_once('../settings.php');


if(count($_POST)>0){
	require_once('auth.php');
	
	if(signup($connection,$_POST['username'],$_POST['email'],$_POST['password'],$_POST['password2'],$_POST['mobile'],$_POST['role'],$_POST['cartype'])) {
        header('location: http://localhost/nku/Server-Side%20Programming/Final%20project/index.php');
        die();
    } echo 'Signup failed';
}
?>

<body>
    <div id="bg" class="pt-2 pb-2">
    <h1 class="text-center mt-lg-5 pt-lg-5 mt-sm-0 pt-sm-0 font-weight-bold">Ced<span class="gree">Cab</span></h1>

    <section class="container-fluid box col-lg-10 col-sm-10 col-xs-12 col-md-7  pt-lg-4 mt-lg-4 pt-sm-0 mt-sm-0 mb-5 pb-3 pt-2">
      <div class="text-center">
        <h4 class="font-weight-bold">Add new taxi driver</h4>
      </div>
        <form method="POST">
            <div class="form-group  row feilds ">
            	<label class="col-sm-2">NAME</label>
            	<input name="username" for="username" type="text" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" class="form-control-plaintext col-sm-10 arro" id="username" placeholder="Enter your name" required>
            </div>
			<div class="form-group  row feilds ">
				<label class="col-sm-2">E-MAIL</label>
            	<input name="email" for="email" type="email" class="form-control-plaintext col-sm-10 arro" id="email" placeholder="Enter your E-mail" required>
        	</div>
            <div class="form-group  row feilds ">
              <label class="col-sm-2"  for="password">PASSWORD</label>
              <input type="password" class="form-control-plaintext col-sm-10 arro" id="password" name="password" placeholder="Enter Password" required>
          	</div>         
          	<div class="form-group  row feilds ">
            	<label class="col-sm-2"  for="password2">RE-PASSWORD</label>
            	<input type="password" class="form-control-plaintext col-sm-10 arro" id="password2" name="password2" placeholder="Re-Enter Password" required>
         	</div>
        	<div class="form-group  row feilds ">
        		<label class="col-sm-2">MOBILE</label>
            	<input name="mobile" for="mobile" type="text" class="form-control-plaintext col-sm-10 arro" maxlength="10" minlength="10" id="mobile"  placeholder="Enter your Mobile Number" required>
        	</div>
			<div class="form-group  row feilds ">
        		<label class="col-sm-2">Car type</label>
				<select name="cartype">
					<option value="1">BASIC</option>
					<option value="2">PRO</option>
					<option value="3">LUXURY</option>
				</select>
        	</div>
        	<input type="hidden" name="role" value="as Driver">
        	<div class="form-group ">
            	<input type="submit" class="btn green btn-primary btn-lg btn-block" id="register" name="submit" value="Sign up">
        	</div>
        </form>
    	</div>
    </section>
  </div>
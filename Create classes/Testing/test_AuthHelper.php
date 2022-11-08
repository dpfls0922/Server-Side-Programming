<?php
    session_start();
    $_SESSION['logged'] = false;
    require_once('../Helpers/AuthHelper.php');
    $auth_helper = new AuthHelper();

    //Sign Up a user and check if logged
    echo '<h1>Sign up & Check if they are logged in</h1>';
    $email = 'dpfls0922@gmail.com';
    $password = 'dldpflssss';
    if ($auth_helper->signUp($email, $password)) {
        $_SESSION['logged'] = true;
    }
    else $_SESSION['logged'] = false;
    echo '$_SESSION[logged] = ';
    if($auth_helper->loggedIn()) echo '1';
    else echo '0';
    echo '<br><br><hr>';

    // Sign out a user and check if logged
    echo '<h1>Sign out & Check if they are logged in</h1>';
    $auth_helper->signOut();
    echo '$_SESSION[logged] = ';
    if($auth_helper->loggedIn()) echo '1';
    else echo '0';
    echo '<br><br><hr>';
    
    // Sign in a user and check if logged
    echo '<h1>Sign in & Check if they are logged in</h1>';
    $email = 'dpfls0922@gmail.com';
    $password = 'dldpflssss';
    echo "Email : dpfls0922@gmail.com<br>";
    if ($auth_helper->signIn($email, $password)) {
        $_SESSION['logged'] = true;
    }
    else {
        $_SESSION['logged'] = false;
    }
    echo '$_SESSION[logged] = ';
    if($auth_helper->loggedIn()) echo '1';
    else echo '0';
    echo '<br><br><hr>';

    // Return the email of the second user in the database
    echo '<h1>Return user information</h1>';
    echo 'Email = '.$auth_helper->returnInfo('../Auth txt Files/users.txt', 1, 0);


?>
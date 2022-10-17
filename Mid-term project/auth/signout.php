<?php
require_once('auth.php');
session_start();

// if the user is not logged in, redirect them to the public page
if(!is_logged()) header('location: ../public_index.php');

// use the following guidelines to create the function in auth.php
signout();
?>
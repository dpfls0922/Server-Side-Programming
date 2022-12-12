<?php
session_start();
include('../adminwrk.php');
require_once('../settings.php');
require_once('../libs/auth.php');

if(!is_login()){
    echo '<script>alert("Please log in");
    window.location.href = "http://localhost/nku/Server-Side%20Programming/Final%20project/index.php";</script>';
}

if(!isset($_POST['pickup']) || !isset($_POST['drop']) || !isset($_POST['cabtype']) || !isset($_POST['lugg'])){
    echo '<script>alert("Please enter all information");
    window.location.href = "http://localhost/nku/Server-Side%20Programming/Final%20project/index.php";</script>';
}

$pickup = $_POST['pickup'];
$drop = $_POST['drop'];
$cabtype = $_POST['cabtype'];
$lugg = $_POST['lugg'];

if($lugg =="") $lugg=0;

$adm = new adminwrk();
$show = $adm->fetloc($connection); 
$d1=0;
$d2=0;

foreach($show as $key=>$val){
     if($val['name']==$pickup) $d1=$val['distance'];
     if($val['name']==$drop) $d2=$val['distance'];
 }
$dist = abs($d1-$d2);
$far = $adm->calfare($cabtype,$dist,$lugg);

date_default_timezone_set('America/New_York');
$datetime = date("Y-m-d h:i");
$id = $_SESSION['userdata']['user_id'];

    $save=$adm->book($pickup,$drop,$cabtype,$dist,$far,$lugg,$datetime,$id,$connection);
    echo '<script>alert("Your Ride request from '.$pickup.' to '.$drop.' BY '.$cabtype.' has been sent");
    window.location.href = "http://localhost/nku/Server-Side%20Programming/Final%20project/index.php";</script>';
?>
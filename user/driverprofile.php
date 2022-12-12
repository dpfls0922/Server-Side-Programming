<?php
require_once('../adminwrk.php');
require_once('../settings.php');
require_once('user.php');

include('../theme/header.php');

include('../theme/navs.php');

include('../theme/ussidebar.php');

$adm = new adminwrk();
$usr = $adm->driverinfo($_GET['driver_name'],$connection);

foreach($usr as $key1=>$val1)
{
    $name = $val1['name'];
    $email = $val1['email'];
    $mob = $val1['mobile'];
} 
?>
<div id="allru">
  <h3 class="text-center">Profile</h3>
  <div class="card p-4">
      <div class=" image d-flex flex-column justify-content-center align-items-center">
        <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /></button>
        <span class="name mt-3" >Name: <?= $name ?></span>
        <span class="email mt-3">Email: <?= $email ?></span>
        <span class="mob mt-3">Mobile: <?= $mob ?></span>
      </div>
    </div>
</div>
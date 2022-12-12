<?php
$_SESSION['userdata']=[];

require_once('libs/auth.php');
require_once('settings.php');

include('theme/header.php');

if(is_login()) include('theme/navs.php');
else include('theme/navh.php'); 

include('theme/body.php');

include('theme/footer.php');
?>
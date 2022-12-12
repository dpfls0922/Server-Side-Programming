<?php
require_once('user.php');
require_once('../settings.php');

if(!isset($_SESSION['userdata']))
{
    header('Location: http://localhost/nku/Server-Side%20Programming/Final%20project/index.php');
}
if($_SESSION['userdata']['is_admin']==1){
  header('Location: http://localhost/nku/Server-Side%20Programming/Final%20project/admin.php');
}

else {

include('../theme/header.php');

include('../theme/navs.php');

include('../theme/ussidebar.php');
?>

<body>

<div class="row">

<div id="drp" class="row p-2">
  <div class="mr-2" id="cstats">
  <label for="stat">CAB Status</label>
  <select name="cstat" id="cstat">
  <option value="" selected>None</option>
  <option value="Pending">Available</option>
  <option value="Canceled">Not in service : Going to pick-up location</option>
  <option value="Completed">Not in service : Going to drop-off location</option>
  </select>
  </div>

  <div class="mr-2" id="cfilt" >
  <label for="filter">CAB Type</label>
  <select name="cfil" id="cfil">
  <option value="" selected>None</option>
  <option value="Basic">Basic</option>
  <option value="Pro">Pro</option>
  <option value="Luxury">Luxury</option>
  </select>
  </div>
</div>
 

<div id="allru">
  <h3 class="text-center">All Rides</h3>
    
    <table id="tbl" class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
        <thead>
            <th>Cab Type</th>
            <th>Status</th>
            <th>Driver name</th>
            <th>Profile</th>
            <th>Book</th>
        </thead>
        <tbody id="tblc">
        <?php 
            $id=$_SESSION['userdata']['user_id'];
            $adm = new user();
            $showr = $adm->allcars($connection);
            echo '<tr>';
            foreach($showr as $key=>$val){
              if($val['cab_type']==0) $val['is_available']=0;
              elseif($val['cab_type']==1) echo "<td>Basic</td>";
              else if($val['cab_type']==2) echo "<td>Pro</td>";
              else if($val['cab_type']==3) echo "<td>Luxury</td>";

              if($val['is_available']==1) echo "<td>Available</td>";
              else if($val['is_available']==2) echo "<td>Not in service : Going to pick-up location</td>";
              else if($val['is_available']==3) echo "<td>Not in service : Going to drop-off location</td>";
              
              echo '<td>'.$val['driver_name'].'</td>';?>
              <form method="POST" action="http://localhost/nku/Server-Side%20Programming/Final%20project/user/driverprofile.php?driver_name=<?= $val['driver_name'] ?>" >
                <td><input type='submit' class='btn green btn-primary btn-block' id='profile' name='driver_name' value="View Profile"></td>
              </form>
               <?php
              if($val['is_available']==1) echo "<td><input type='submit' onclick=\"location.href='http://localhost/nku/Server-Side%20Programming/Final%20project/libs/book.php'\" class='btn green btn-primary btn-block' id='book1' name='book' value='Book Now'></td>";
              echo '</tr>';
            }
        ?>
        </tbody>

    </table>
  </div>
  </div>
<?php }


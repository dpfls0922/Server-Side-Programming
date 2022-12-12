<?php
require_once('settings.php');
require_once('adminwrk.php');
?>

<body>
<div id="bg" class="pt-2 pb-2">
    <h1 class="text-center mt-lg-5 pt-lg-5 mt-sm-0 pt-sm-0 font-weight-bold">Book a Taxi to your destination</h1>
    <h5 class="text-center ">Choose from a range of categories and prices</h5>
    <section class="container-fluid box col-lg-4 col-sm-10 col-xs-12 col-md-7 ml-lg-5 ml-md-5 pt-lg-4 mt-lg-4 pt-sm-0 mt-sm-0 mb-5 pb-3 pt-2">
      <div class="text-center">
        <div class="tup1">
          <button class="btn btn-primary green btn-sm tup font-weight-bold">CITY TAXI</button><hr>
        </div>
        <h4 class="font-weight-bold">Your everyday travel partner</h4>
        <h6>AC cabs for point to point travel</h6>
      </div>
        <form action="libs/book.php" method="POST">
            <div class="form-group  row feilds ">
                <label class="col-sm-3"  for="pickup">PICKUP</label>
                <select name="pickup"  class="form-control-plaintext col-sm-9 arro choose" id="pickup">
                  <option value="" class="text-secondary" selected disabled hidden>Current Location</option>
                  
                  <?php
                  $adm = new adminwrk();
                  $show = $adm->fetloc($connection); ?>
                  <?php
                  foreach($show as $key=>$val){?>
                  <option value="<?= $val['name'] ?>"><?= $val['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <!-- <p id="ep" class="bg-danger text-center">Enter pickup point</p> -->
            <div class="form-group  row feilds ">
              <label class="col-sm-3"  for="drop">DROP</label>
              <select name="drop" class="form-control-plaintext col-sm-9 arro choose" id="drop">
                <option value=""  selected disabled hidden>Enter drop for ride estimate</option>
                <?php
                  $adm = new adminwrk();
                  $show = $adm->fetloc($connection); 
                  ?>
                  <?php foreach($show as $key=>$val){?>
                  <option value="<?php echo $val['name']; ?>"><?php echo $val['name']; ?></option>
                  <?php } ?>
              </select>
          </div>
          <!-- <p id="ed" class="bg-danger text-center">Enter Droping point</p> -->
          <div class="form-group  row feilds ">
            <label class="col-sm-3"  for="cabtype">CAB TYPE</label>
            <select name="cabtype"  class="form-control-plaintext col-sm-9 arro" id="cabtype">
              <option value=""  selected disabled hidden>Drop down to select CAB type</option>
              <option value="Basic">Basic</option>
              <option value="Pro">Pro</option>
              <option value="Luxury">Luxury</option>
            </select>
        </div>
        <!-- <p id="ec" class="bg-danger text-center">Enter Cabtype</p> -->
        <div class="form-group  row feilds ">
          <label class="col-sm-3" for="luggage">LUGGAGE</label>
          <input type="text" name="lugg"  class="form-control-plaintext col-sm-9 arrow" maxlength="2" id="lugg" placeholder="Enter weight in KG">
        </div>
            <div class="form-group ">
                <input type="submit" onclick="location.href='libs/book.php'" class="btn green btn-primary btn-lg btn-block" id="book1" name="book" value="Book Now">
            </div>
        </form>
    </div>
    </section>
  </div>
  
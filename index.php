<?php
require_once('data.php');
require_once('functions.php');
$i=0;
?>

<?php
function showSingleCard($info, $i){ ?>
    <div class="row">
    <?php
    for($i=0;$i<count($info);$i++){
        switch($info[$i]['grade']) {
        case(1): $icon="fa-regular fa-1"; break;
        case(2): $icon="fa-regular fa-2"; break;
        case(3): $icon="fa-regular fa-3"; break;
        case(4): $icon="fa-regular fa-4"; break;
        } ?>

        <!-- Single Advisor-->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="<?= strval($i/10 + 0.2) ?>.s" style="visibility: visible; animation-delay: <?= strval($i/10 + 0.2) ?>.s; animation-name: fadeInUp;">
                <!-- Team Thumb-->
                <div class="advisor_thumb"><a href="detail.php?index=<?= $i ?>"><img src="<?= $info[$i]['picture'] ?>" alt=""></a>
                    <!-- Social Info-->
                    <div class="social-info"><a href="detail.php?index=<?= $i ?>"><i class="fa fa-facebook"></i></a><a href="detail.php?index=<?= $i ?>"><i class="fa fa-twitter"></i></a><a href="detail.php?index=<?= $i ?>"><i class="fa fa-linkedin"></i></a></div>
                </div>
                <!-- Team Details-->
                <div class="single_advisor_details_info">
                    <h6><?= $info[$i]['name'] ?></h6>
                    <p class="designation"><i class="<?= $icon ?>">&nbsp;</i><?= $info[$i]['designation'] ?></p>
                    <p class="year" style="font-size: 5px;"><?= calAge($info, $i).howManyYmds($info, $i) ?></p>
                </div>
            </div>
        </div> <?php
    } ?>
    </div>
<?php }?>

<!doctype html>
<html lang="en">

<head>
    <!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/0f5d728221.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/index.css" />
    <title>ASE 230 - class of Spring/Fall/Summer 2022</title>
</head>

<body>
    <div class="container text-center">
        <h1><?= 'This is ASE 230 - class of Spring/Fall/Summer 2022'; ?></h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
                <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h3><?= 'Our Creative'; ?> <span> <?= 'Team'; ?></span></h3>
                    <p><?= 'Appland is completely creative, lightweight, clean &amp; super responsive app landing page.'; ?></p>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <!-- SingleCard Information -->
        <?= showSingleCard($info, $i) ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
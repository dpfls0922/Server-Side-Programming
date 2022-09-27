<?php

$i=0;
$info= [
    [
        'name'=>'Yerin Lee',
        'designation'=>'Student',
        'gender'=>'female',
        'grade' => '3',
        'picture'=>'img/Yerin Lee.png',
        'email' => 'dpfls0922@naver.com',
        'profession' => 'Server-side developer',
        'company' => 'Naver',
        'intro' => 'I am an exchange student from South Korea. My major is Computer Science and I am a junior. After self-study by referring to Internet materials, I once produced a simple crud (create, read, update, delete) web page. I felt that I lacked my skills because I relied only on Googling when producing the program. Through this class, I want to develop my development skills by solidifying my knowledge of server.',
        'sentence' => 'The price is something not necessarily defined as financial. It could be time, effort, sacrifice, money or perhaps, something else.',
        'fun' => 'I am an fraternal twin. My twin sister is attending a university in South Korea now. My roommate now is a friend I met in high school. We go to the same university and we are majoring in Computer Science. In addition, this friend and I came to NKU together.',
        'skills' => [66, 70, 85]
    ],
    [
        'name'=>'Nazrul Islam',
        'designation'=>'Student',
        'gender'=>'male',
        'grade' => '3',
        'picture'=>'img/Nazrul Islam.png',
        'email' => 'nazrul@naver.com',
        'profession' => 'IOS developer',
        'company' => 'Apple',
        'intro' => 'Hi I am Nazrul. Nice to meet you. My hobby is baking. I feel good when I eat cookies and bread that I made. It also makes me feel good to present this to people around me.',
        'sentence' => 'Opportunities are never lost. The other fellow takes those you miss.',
        'fun' => 'I saw a dancer on the street on my way to school this morning. I think I am also overflowing with energy.',
        'skills' => [85, 88, 70]
    ],
    [
        'name'=>'Riyadh Khan',
        'designation'=>'Student',
        'gender'=>'male',
        'grade' => '1',
        'picture'=>'img/Riyadh Khan.png',
        'email' => 'riyadh@gmail.com',
        'profession' => 'Android developer',
        'company' => 'Google',
        'intro' => 'My name is Riyadh Khan. I liked to play with computers since I was young and naturally chose computer science as my major.',
        'sentence' => 'We only see what we know.',
        'fun' => 'I am a k-drama person. The drama that I enjoyed recently ended yesterday. It was so much fun, but I am sad that it ended.',
        'skills' => [72, 90, 78]
    ],
    [
        'name'=>'Niloy Islam',
        'designation'=>'Student',
        'gender'=>'male',
        'grade' => '2',
        'picture'=>'img/Niloy Islam.png',
        'email' => 'niloy@nku.edu',
        'profession' => 'front-end designer',
        'company' => 'Microsoft',
        'intro' => 'I am a sophomore, majoring in statistics, and my minor is computer science. It is my first time making a web server, so I am nervous and excited.',
        'sentence' => 'We did not change as we grew older; we just became more clearly ourselves.',
        'fun' => 'This morning my cat came up on my stomach and lay down for about 20 minutes.',
        'skills' => [75, 90, 50]
    ]
];

?>
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
        
        <div class="row">
        <?php
            for($i=0;$i<count($info);$i++){

            switch($info[$i]['grade'])
            {
            case(1):
                $icon="fa-regular fa-1";
                break;
            case(2):
                $icon="fa-regular fa-2";
                break;
            case(3):
                $icon="fa-regular fa-3";
                break;
            case(4):
                $icon="fa-regular fa-4";
                break;
            }
            ?>

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
                    </div>
                </div>
            </div>
	    <?php
        } ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
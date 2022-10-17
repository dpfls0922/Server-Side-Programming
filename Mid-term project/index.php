<?php

// Only members
session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true)
    header('location: public_index.php');
?>
<html>
    <body>
        <h1>Welcome, <?= $_SESSION['email'] ?>!</h1>
    </body>
</html>
<?php
require_once('csv_util.php');
$fh=fopen('data/quotes.csv', 'r');

while($line=fgets($fh)){
    if(strlen(trim($line))>0){
        $strTok =explode(';' , trim($line));
        echo '<h4>'.$strTok[1].' - '.getAuthor($strTok[0]).'</h4>';
    }
}
fclose($fh);
?>
<a href="authors/index.php"><button>View authors</button></a>
<a href="quotes/index.php"><button>View quotes</button></a><br><br>
<a href="create.php"><button>create</button></a><br><br>
<a href="auth/signout.php"><button>Sign out</button></a>
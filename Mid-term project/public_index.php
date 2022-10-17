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
<a href="authors/public_index.php"><button>View authors</button></a>
<a href="quotes/public_index.php"><button>View quotes</button></a><br><br>

<a href="auth/signin.php"><button>Sign in</button></a>
<a href="auth/signup.php"><button>Sign up</button></a>
<?php
require_once('csv_util.php');
$fh1=fopen('quotes.csv', 'r');
$fh2=fopen('authors.csv', 'r');

$quoteID=0;
while($line=fgets($fh1)){
    if(strlen(trim($line))>0){
        $strTok =explode(';' , trim($line));
        $authorID =  $strTok[0];
        echo '<h2><a href="detail.php?quoteID='.$quoteID.'">'.$strTok[1].'</a> - '.'<a href="detail.php?quoteID='.$quoteID.'">'.getCSVintoPhp('authors.csv', $authorID).'</h2>';
    }
    $quoteID++;
}

fclose($fh1);
fclose($fh2);
?>

<a href="create.php"><button>create</button></a><br><br>
<a href="authors/index.php"><button>View only authors</button></a>
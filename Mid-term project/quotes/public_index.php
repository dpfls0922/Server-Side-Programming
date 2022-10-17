<?php
$fh=fopen('../data/quotes.csv', 'r');
$index=0;
while($line=fgets($fh)){
    if(strlen(trim($line))>0){
        $strTok =explode(';' , trim($line));
        echo '<h4>'.$strTok[1].'</h4>';
    }
    $index++;
}
fclose($fh);
?>
<a href="../public_index.php"><button>View all the quotes with their authors</button></a>

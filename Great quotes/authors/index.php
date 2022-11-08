<?php
$fh=fopen('../authors.csv', 'r');
$index=0;
while($line=fgets($fh)){
    if(strlen(trim($line))>0) echo '<h3><a href="detail.php?index='.$index.'">'.trim($line).'</a> (<a href="detail.php?index='.$index.'">detail</a>) (<a href="modify.php?index='.$index.'">modify</a>) (<a href="delete.php?index='.$index.'">delete</a>)</h3>';
    $index++;
}
fclose($fh);
?>

<a href="../index.php"><button>View all the quotes with their authors</button></a>
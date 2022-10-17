<?php
$fh=fopen('../data/authors.csv', 'r');
$index=0;
while($line=fgets($fh)){
    if(strlen(trim($line))>0) echo '<h4><a href="detail.php?index='.$index.'">'.trim($line).'</a> (<a href="detail.php?index='.$index.'">detail</a>) (<a href="modify.php?index='.$index.'">modify</a>) (<a href="delete.php?index='.$index.'">delete</a>)</h4>';
    $index++;
}
fclose($fh);
?>

<a href="../index.php"><button>View all the quotes with their authors</button></a>
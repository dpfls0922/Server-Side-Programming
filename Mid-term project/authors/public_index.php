<?php
$fh=fopen('../data/authors.csv', 'r');
$index=0;
while($line=fgets($fh)){
    if(strlen(trim($line))>0) echo '<h4>'.trim($line).'</h4>';
    $index++;
}
fclose($fh);
?>

<a href="../public_index.php"><button>View all the quotes with their authors</button></a>
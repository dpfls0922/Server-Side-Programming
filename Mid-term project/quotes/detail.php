<a href="index.php">Go back to index</a><hr />
<?php
$line_counter=0;
$fh=fopen('../data/quotes.csv', 'r');

while($line=fgets($fh)){
    if($line_counter==$_GET['index']){
        //display the quote
        $strTok=explode(';' , trim($line));
        echo $strTok[1];
    }
    $line_counter++;
}
fclose($fh);
?>
<a href="modify.php?index=<?= $_GET['index'] ?>"><button>modify</button></a>
<a href="delete.php?index=<?= $_GET['index'] ?>"><button>delete</button></a>
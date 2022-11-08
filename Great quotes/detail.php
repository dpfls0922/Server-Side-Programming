<a href="index.php">Go back to index</a><hr />
<?php
require_once('csv_util.php');

$line_counter=0;
$fh=fopen('quotes.csv', 'r');
while($line=fgets($fh)){
    if($line_counter==$_GET['quoteID']){
        //display the quotes with their authors
        $strTok=explode(';' , trim($line));
        echo '<h1>'.$strTok[1].' - '.getCSVintoPhp('authors.csv', $strTok[0]).'</h1>';
    }
    $line_counter++;
}
fclose($fh);
?>
<a href="modify.php?authorID=<?= $strTok[0] ?> & quoteID=<?= $_GET['quoteID'] ?>"><button>modify</button></a>
<a href="#" onclick="myFunction()"><button>delete</button></a>

<script>
function myFunction() {
  let text;
  if (confirm("Are you sure you want to delete it?") == true)
    location.href = "delete.php?authorID=<?= $strTok[0] ?> & quoteID=<?= $_GET['quoteID'] ?>";
}
</script>

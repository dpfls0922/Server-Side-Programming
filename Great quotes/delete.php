<?php
require_once('csv_util.php');

if(!isset($_GET['authorID']) && !isset($_GET['quoteID'])){
    die('Please enter the author you want to delete');
}

$line_counter=0;
$new_file_content=''; // ROD C
$fh=fopen('quotes.csv', 'r');

while($line=fgets($fh)){
    if($line_counter==$_GET['quoteID']){
        $new_file_content.=PHP_EOL;

        if(authorCounter($_GET['authorID']) == 1){
            deleteAuthor($_GET['authorID']);
        }
    } 
    else $new_file_content.=$line;
    $line_counter++;
}
fclose($fh);

file_put_contents('quotes.csv', $new_file_content);
echo 'You have successfully deleted the quote';
?>
<br>
<a href="index.php">Go back to index</a>
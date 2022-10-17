<a href="index.php">Go back to index</a><hr />
<?php
require_once('../csv_util.php');

if(!isset($_GET['index'])){
    die('Please enter the author you want to delete');
}

$line_counter=0;
$new_file_content=''; // ROD C
$fh=fopen('../data/quotes.csv', 'r');

while($line=fgets($fh)){
    if($line_counter==$_GET['index']){
        $new_file_content.=PHP_EOL;
        $strTok=explode(';' , trim($line));
        if(authorCounter($strTok[0]) == 1)
            deleteAuthor($strTok[0]);
    }
    else $new_file_content.=$line;
    $line_counter++;
}
fclose($fh);

file_put_contents('../data/quotes.csv', $new_file_content);
echo 'You have successfully deleted the quote';
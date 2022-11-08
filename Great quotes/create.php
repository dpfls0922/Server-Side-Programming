<?php
require_once('csv_util.php');

$error="";
if(count($_POST)>0){
    if(strlen($_POST['quote'])==0) echo "Write the quote<br>";
    // Make sure the quote is not already in the file
    else{
        if(file_exists('quotes.csv')){
            $fh=fopen('quotes.csv', 'r');
            while($line=fgets($fh)){
                if($_POST['quote']==trim($line)){
                    // found the quote already
                    $error='The quote already exists<br>';
                };
            }
            fclose($fh);
        }
        if(strlen($error)>0) echo $error;
        else{
            // Add the quote to the CSV file
            addCSV('quotes.csv', $_POST['author'].'; '.$_POST['quote'].PHP_EOL);
            echo 'Thanks for adding the quote to our amazing website<br>';
        }
    }
}
?>


<a href="index.php">Go back to index</a><hr />
<form method="POST">
    Enter the quote<br />
    <input type="text" name="quote" placeholder="Write the quote"/>
    <select name="author" id="author">
    <?php
    $line_counter=0;
    if(file_exists('authors.csv')){
        $fh = fopen('authors.csv', "r");
        while($line=fgets($fh)) $line_counter++;
        fclose($fh);
    }    
    for($i=0; $i<$line_counter; $i++){
        $author=getCSVintoPhp('authors.csv', $i);
        if(strlen($author)==0) continue;
        else ?> <option value=<?=$i?>><?=$author?></option> <?php
    }?>
    </select><br />
    <button type="submit">Add quote</button>
</form>
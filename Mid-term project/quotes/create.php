<?php
$error="";
if(count($_POST)>0){
    print_r($_POST);

    // Make sure the quote is not already in the file
    if(file_exists('../data/quotes.csv')){
        $fh=fopen('../data/quotes', 'r');
        while($line=fgets($fh)){
            if($_POST['quote']==trim($line)){
                // found the quote already
                $error='The quote already exists';
            };
        }
        fclose($fh);
    }

    if(strlen($error)>0) echo $error;
    else{
        // Add the quote to the CSV file
        $fh=fopen('../data/quotes', 'a');
        fputs($fh, $_POST['quote'].PHP_EOL);
        fclose($fh);
        echo 'Thanks for adding '.$_POST['quote'].' to our amazing website';
    }
}
?>
<a href="index.php">Go back to index</a><hr />
<form method="POST">
    Enter the quote<br />
    <input type="text" name="quote"/><br />
    <button type="submit">Add quote</button>
</form>
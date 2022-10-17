<?php
$error="";
if(count($_POST)>0){
    print_r($_POST);

    // Make sure the name is not already in the file
    if(file_exists('../data/authors.csv')){
        $fh=fopen('../data/authors.csv', 'r');
        while($line=fgets($fh)){
            if($_POST['name']==trim($line)){
                // found the name already
                $error='The author already exists';
            };
        }
        fclose($fh);
    }

    if(strlen($error)>0) echo $error;
    else{
        // Add the name to the CSV file
        $fh=fopen('../data/authors.csv', 'a');
        fputs($fh, $_POST['name'].PHP_EOL);
        fclose($fh);
        echo 'Thanks for adding '.$_POST['name'].' to our amazing website';
    }
}
?>
<a href="index.php">Go back to index</a><hr />
<form method="POST">
    Enter the author's name<br />
    <input type="text" name="name"/><br />
    <button type="submit">Add author</button>
</form>
<a href="index.php">Go back to index</a><hr />
<?php
if(count($_POST)>0){
    if(!isset($_GET['index'])){
        die('Please enter the quote you want to modify');
    }
    //save the quote into the file
    if(file_exists('../data/quotes.csv')){
        $line_counter=0;
        $new_file_content=''; // ROD C
        $fh=fopen('../data/quotes.csv', 'r');
        while($line=fgets($fh)){
            if($line_counter==$_GET['index']){
                $strTok =explode(';' , trim($line));
                $new_file_content.=$strTok[0]."; ".$_POST['quote'].PHP_EOL;
            }
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);

        file_put_contents('../data/quotes.csv',$new_file_content);
        echo 'You have successfully modified the quote.';
        }
}else{
    $quote_sentence='';
    $line_counter=0;
    $fh=fopen('../data/quotes.csv', 'r');
    
    while($line=fgets($fh)){
        if($line_counter==$_GET['index']){
            //display the quote
            $strTok =explode(';' , trim($line));            
            $quote_sentence=$strTok[1];
        }
        $line_counter++;
    }
    fclose($fh);
    ?>
    <form method="POST">
        Modify the quote<br />
        <input type="next" name="quote" value="<?= $quote_sentence ?>" /><br />
        <button type="submit">Modify quote</button>
    </form>
    
    <?php
}
<h2>Author</h2>
<?php
if(isset($_POST['name'])){
    if(!isset($_GET['authorID'])){
        die('Please enter the author you want to modify');
    }?>
    <?php
    //save the author's name into the file
    if(file_exists('authors.csv')){
        $line_counter=0;
        $new_file_content=''; // ROD C
        $fh=fopen('authors.csv', 'r');
        while($line=fgets($fh)){
            if($line_counter==$_GET['authorID']) $new_file_content.=$_POST['name'].PHP_EOL;
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);

        file_put_contents('authors.csv',$new_file_content);
        echo 'You have successfully modified the author.';
        }
}else{
    $author_name='';
    $line_counter=0;
    $fh=fopen('authors.csv', 'r');
    
    while($line=fgets($fh)){
        if($line_counter==$_GET['authorID']){
            //display the author
            $author_name=trim($line);
        }
        $line_counter++;
    }
    fclose($fh);
    ?>
    <form method="POST">
        Modify the author's name<br />
        <input type="next" name="name" value="<?= $author_name ?>" /><br />
        <button type="submit">Modify author</button>
    </form>
    
    <?php
}?>

<h2>Text</h2>
<?php
if(isset($_POST['quote'])){
    if(!isset($_GET['quoteID'])){
        die('Please enter the quote you want to modify');
    }
    //save the quote into the file
    if(file_exists('quotes.csv')){
        $line_counter=0;
        $new_file_content=''; // ROD C
        $fh=fopen('quotes.csv', 'r');
        while($line=fgets($fh)){
            if($line_counter==$_GET['quoteID']){
                $strTok =explode(';' , trim($line));
                $new_file_content.=$strTok[0]."; ".$_POST['quote'].PHP_EOL;
            }
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);

        file_put_contents('quotes.csv',$new_file_content);
        echo 'You have successfully modified the quote.';
        }
}else{
    $quote_sentence='';
    $line_counter=0;
    $fh=fopen('quotes.csv', 'r');
    
    while($line=fgets($fh)){
        if($line_counter==$_GET['quoteID']){
            //display the quote
            $strTok =explode(';' , trim($line));            
            $quote_sentence=trim($strTok[1]);
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
?>
</br>
<a href="detail.php?quoteID=<?= $_GET['quoteID'] ?>">Go back to detail page</a>
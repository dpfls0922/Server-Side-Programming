<a href="index.php">Go back to index</a><hr />
<?php
if(count($_POST)>0){
    if(!isset($_GET['index'])){
        die('Please enter the author you want to modify');
    }
    //save the author's name into the file
    if(file_exists('../data/authors.csv')){
        $line_counter=0;
        $new_file_content=''; // ROD C
        $fh=fopen('../data/authors.csv', 'r');
        while($line=fgets($fh)){
            if($line_counter==$_GET['index']) $new_file_content.=$_POST['name'].PHP_EOL;
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);

        file_put_contents('../data/authors.csv',$new_file_content);
        echo 'You have successfully modified the author.';
        }
}else{
    $author_name='';
    $line_counter=0;
    $fh=fopen('../data/authors.csv', 'r');
    
    while($line=fgets($fh)){
        if($line_counter==$_GET['index']){
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
}
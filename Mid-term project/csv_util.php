<?php
function getAuthor(int $index){
    if(file_exists('data/authors.csv')){
        $fh = fopen('data/authors.csv', "r");
        $line_counter=0;
        while($line=fgets($fh)){
            if($line_counter==$index){
                if(strlen(trim($line))>0) return trim($line);
            }
            $line_counter++;
        }
        fclose($fh);
    }
}
function addCSV(string $filepath, string $content){
    $fh = fopen($filepath, "a");
    fputs($fh, $content);
    fclose($fh);
}
function authorCounter(int $index){
    $counter=0;
    if(file_exists('../data/quotes.csv')){
        $fh = fopen('../data/quotes.csv', "r");
        while($line=fgets($fh)){
            $strTok=explode(';' , trim($line));
            if($strTok[0]==$index) $counter++;
        }
        fclose($fh);
    }
    return $counter;
}
function deleteAuthor(int $index){
    $line_counter=0;
    $new_file_content=''; // ROD C
    if(file_exists('../data/authors.csv')){
        $fh = fopen('../data/authors.csv', "r");
        while($line=fgets($fh)){
            if($line_counter==$index) $new_file_content.=PHP_EOL;
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);
    }
    file_put_contents('../data/authors.csv', $new_file_content);
}
function deleteQuotes(int $index){
    $new_file_content=''; // ROD C
    if(file_exists('../data/quotes.csv')){
        $fh = fopen('../data/quotes.csv', "r");
        while($line=fgets($fh)){
            $strTok=explode(';' , trim($line));
            if($strTok[0]==$index) $new_file_content.=PHP_EOL;
            else $new_file_content.=$line;
        }
        fclose($fh);
    }
    file_put_contents('../data/quotes.csv', $new_file_content);
}
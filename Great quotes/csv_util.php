<?php
// one function for reading the content of a CSV-formatted file into a PHP array (with all the records)
function readCSVintoPHP(string $filepath){
    $fh = fopen($filepath, "r");
    $data = array();
    while($line=fgets($fh)){
        if(strlen(trim($line))>0){
            $strTok =explode(';' , trim($line));
            if(count($strTok)==2)
                array_push($data, array('key'=>$strTok[0], 'value'=>$strTok[1]));
            else
                array_push($data, $strTok[0]);
        }
    }
    foreach($data as $item){
        if(is_array($item) == 1){
            foreach($item as $key=>$value){
                echo "<br>".$value;
            }
        }else{
            echo "<br>".$item;
        }
    }
    fclose($fh);
}

// one function for reading the content of a CSV-formatted file into a PHP array and returning one element with index $element (i.e., only one record )
function getCSVintoPhp(string $filepath, int $index){
    if(file_exists($filepath)){
        $fh = fopen($filepath, "r");
        $data = array();
        while($line=fgets($fh)){
            $strTok =explode(';' , trim($line));
            if(count($strTok)==2)
                array_push($data, array('key'=>$strTok[0], 'value'=>$strTok[1]));
            else
                array_push($data, $strTok[0]);
        }

        for($i=0; $i<count($data); $i++){
            if(is_array($data[$i]) == 1){
                $targetID = array_search($index, array_column($data, 'key'));
                return $data[$targetID]['value'];
            }else
                if($i==$index) return $data[$i];
        }
        fclose($fh);
    }
}

// one function for adding a new record to a CSV-formatted file
function addCSV(string $filepath, string $content){
    $fh = fopen($filepath, "a");
    fputs($fh, $content);
    fclose($fh);
}

// one function for modifying the record on a specific line
function modifyCSV(){
    
}

// one function for emptying the record on a specific line (delete the content of a line, but leave an empty line  in the file)
function emptyCSV(){

}

// one function for deleting a line from the file (delete the line altogether)
function deleteAuthor(int $index){
    $line_counter=0;
    $new_file_content=''; // ROD C
    if(file_exists('authors.csv')){
        $fh = fopen('authors.csv', "r");
        while($line=fgets($fh)){
            if($line_counter==$index) $new_file_content.=PHP_EOL;
            else $new_file_content.=$line;
            $line_counter++;
        }
        fclose($fh);
    }
    file_put_contents('authors.csv', $new_file_content);
}

function deleteQuotes(int $index){
    $new_file_content=''; // ROD C
    if(file_exists('quotes.csv')){
        $fh = fopen('quotes.csv', "r");
        while($line=fgets($fh)){
            $strTok=explode(';' , trim($line));
            if($strTok[0]==$index) $new_file_content.=PHP_EOL;
            else $new_file_content.=$line;
        }
        fclose($fh);
    }
    file_put_contents('quotes.csv', $new_file_content);
}

function authorCounter(int $index){
    $counter=0;
    if(file_exists('quotes.csv')){
        $fh = fopen('quotes.csv', "r");
        while($line=fgets($fh)){
            $strTok=explode(';' , trim($line));
            if($strTok[0]==$index) $counter++;
        }
        fclose($fh);
    }
    return $counter;
}
<?php
    require_once('../Helpers/CSVHelper.php');
    // Create a new CSVHelper object 
    $CSV_file_helper_1 = new CSVHelper('../CSV/random.CSV');
    $backup = new CSVHelper('../CSV/backup_random.CSV');
    $backup_array = $backup->readFile();
    $CSV_file_helper_1->writeFile($backup_array);

    // 1. Read
    echo '<h1>Read</h1>';
    echo '<h4>Read the Entire CSV File</h4>';
    $array = $CSV_file_helper_1->readFile();
    print_r($array);
    echo '<br><br>';

    echo '<h4>Read one record</h4>';
    $first_record = $CSV_file_helper_1->readFile(0);
    print_r($first_record);
    echo '<br><br>';

    echo '<h4>Read one value</h4>';
    $last_name = $CSV_file_helper_1->readFile(0, 1);
    echo $last_name;
    echo '<br><br><hr>';
    
    // 2. Write
    echo '<h1>Write</h1>';
    echo '<h4>Write to a CSV File</h4>';
    $array[0][1] = 'Cam';
    $CSV_file_helper_1->writeFile($array);
    print_r($array);
    echo '<br><br>';

    echo '<h4>Append to a CSV File</h4>';
    $new_record = ['first', 'second'];
    $CSV_file_helper_1->writeFile($new_record, true);
    print_r($CSV_file_helper_1->readFile());
    echo '<br><br><hr>';

    // 3. Modify
    echo '<h1>Modify</h1>';
    echo '<h4>Modify entire array</h4>';
    $diff_array = [
            'Hi Hello How are you?',
            'What are you doing now?'
    ];
    $CSV_file_helper_1->modifyFile($diff_array);
    print_r($CSV_file_helper_1->readFile());
    echo '<br><br>';

    echo '<h4>Modify one record</h4>';
    $new_record = array('Hello', 'Hi');
    $CSV_file_helper_1->modifyFile($new_record, 0);
    print_r($CSV_file_helper_1->readFile());
    echo '<br><br>';

    echo '<h4>Modify one value</h4>';
    $new_record = 'Great';
    $CSV_file_helper_1->modifyFile($new_record, 0, 1);
    print_r($CSV_file_helper_1->readFile());
    echo '<br><br><hr>';

    // 4. Delete
    echo '<h1>Delete</h1>';
    echo '<h4>Delete the entire file</h4>';
    $CSV_file_helper_1->deleteFrom();
    print_r($CSV_file_helper_1->readFile());
    $CSV_file_helper_1->writeFile($backup_array);
    echo '<br><br>';
    
    echo '<h4>Delete second record</h4>';
    $CSV_file_helper_1->deleteFrom(1);
    print_r($CSV_file_helper_1->readFile());
    $CSV_file_helper_1->writeFile($backup_array);
    echo '<br><br>';

    // Delete a specific value from a record
    echo '<h4>Delete first name from first record</h4>';
    $CSV_file_helper_1->deleteFrom(0, 2);
    print_r($CSV_file_helper_1->readFile());
    $CSV_file_helper_1->writeFile($backup_array);

?>
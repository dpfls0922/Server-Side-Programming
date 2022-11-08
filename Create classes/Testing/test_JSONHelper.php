<?php
    require_once('../Helpers/JSONHelper.php');
    // Create a new JSONHelper object 
    $JSON_reader_1 = new JSONHelper('../JSON/test.json');
    $backup = new JSONHelper('../JSON/backup_test.json');
    $backup_array = $backup->readFile();
    $JSON_reader_1->writeFile($backup_array);
    
    // 1. Read
    echo '<h1>Read</h1>';
    echo '<h4>Read the Entire JSON File</h4>';
    $array = $JSON_reader_1->readFile();
    print_r($array);
    echo '<br><br>';

    echo '<h4>Read one record</h4>';
    $first_record = $JSON_reader_1->readFile(0);
    print_r($first_record);
    echo '<br><br>';
    
    echo '<h4>Read one value</h4>';
    $last_name = $JSON_reader_1->readFile(0, 'last name');
    echo $last_name;
    echo '<br><br><hr>';
    
    // 2. Write
    echo '<h1>Write</h1>';
    echo '<h4>Write to a JSON File (Add Cam as first name)</h4>';
    $array[0]['first name'] = 'Cam';
    $JSON_reader_1->writeFile($array);
    print_r($array[0]);
    echo '<br><br>';

    echo '<h4>Append to a JSON File</h4>';
    $new_record = array(
        'first name' => "Carl", 
        'last name' => "Monk"
    );
    $JSON_reader_1->writeFile($new_record, true);
    print_r($array[1]);
    echo '<br><br><hr>';

    // 3. Modify
    echo '<h1>Modify</h1>';
    echo '<h4>Modify entire array</h4>';
    $diff_array = [
        [
            'Green',
            'Blue'
        ],
        [
            'Black',
            'Brown'
        ]
    ];
    $JSON_reader_1->modifyFile($diff_array);
    print_r($JSON_reader_1->readFile());
    echo '<br><br>';
    
    echo '<h4>Modify one record</h4><br>';
    $JSON_reader_1->modifyFile($diff_array, 0);
    print_r($JSON_reader_1->readFile());
    echo '<br><br>';
    
    // Modify one value in a record
    echo '<h4>Modify one value in a JSON record</h4><br>';
    $JSON_reader_1->modifyFile($diff_array, 0, 1);
    print_r($JSON_reader_1->readFile());
    echo '<br><br><hr>';

    // 4. Delete
    echo '<h1>Delete</h1>';
    echo '<h4>Delete the entire file</h4>';
    $JSON_reader_1->deleteFrom();
    print_r($JSON_reader_1->readFile());
    $JSON_reader_1->writeFile($backup_array);
    echo '<br><br>';
    
    echo '<h4>Delete second record from the JSON file</h4>';
    $JSON_reader_1->deleteFrom(1);
    print_r($JSON_reader_1->readFile());
    $JSON_reader_1->writeFile($backup_array);
    echo '<br><br>';
    
    echo '<h4>Delete first name from first record</h4>';
    $JSON_reader_1->deleteFrom(0, "first name");
    print_r($JSON_reader_1->readFile(0));
    $JSON_reader_1->writeFile($backup_array);

?>
<?php
    require_once('../Helpers/Entity.php');

    // Make an object for a JSON and a CSV file
    $json_entity = new Entity('../JSON/test.json');
    $csv_entity = new Entity('../CSV/random.CSV');

    // Reset Arrays after each execution
    $reset_json = new Entity('../JSON/reset_test.json');
    $json_array = $reset_json->readEntity();

    $reset_csv = new Entity('../CSV/reset_random.CSV');
    $csv_array = $reset_csv->readEntity();

    // 1. Read
    echo '<h1>Read</h1>';
    echo '<h4>Read a JSON File and Print the Second Entity</h4>';
    $json_array = $json_entity->readEntity(1);
    print_r($json_array);
    echo '<br><br>';

    echo '<h4>Read a CSV File and Print the First Entity</h4>';
    $csv_array = $csv_entity->readEntity(0);
    print_r($csv_array);
    echo '<br><br><hr>';

    // 2. Add
    echo '<h1>Add</h1>';
    echo '<h4>Add a New Entity to the JSON File</h4>';
    $appended_entity_json = new Entity('../JSON/backup_test.json');
    $appended_array_json = $appended_entity_json->readEntity();
    $json_entity->addEntity($appended_array_json[0], true);
    $json_array = $json_entity->readEntity();
    print_r($json_array);
    echo '<br><br>';

    echo '<h4>Add a New Entity to the CSV File</h4>';
    $appended_entity_csv = new Entity('../CSV/backup_random.CSV');
    $appended_array_csv = $appended_entity_csv->readEntity();
    $csv_entity->addEntity($appended_array_csv[0], true);
    $csv_array = $csv_entity->readEntity();
    print_r($csv_array);
    echo '<br><br><hr>';

    // 3. Modify
    echo '<h1>Modify</h1>';
    echo '<h4>Modify the Second Value in the First Entity in the JSON File and Print that Value</h4>';
    $new_json_value = 'Kim';
    $json_entity->modifyEntity($new_json_value, 0, 'last name');
    $json_array = $json_array = $json_entity->readEntity();
    print_r($json_array[0]['last name']);



?>
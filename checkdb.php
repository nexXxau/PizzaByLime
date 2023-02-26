<?php

$dbs_name = ['products', 'dishes', 'prod_in_dish'];
$dbs_data = 
[[
    'id' => 'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
    'product_name' => 'VARCHAR(30) NOT NULL',
    'price_per_kg' => 'decimal(10,2) NOT NULL',
], [
    'id' => 'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
    'dishes_name' => 'VARCHAR(30) NOT NULL',
], [
    'id' => 'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
    'product_id' => 'INT(6) NOT NULL',
    'dishes_id' => 'INT(6) NOT NULL',
    'weight' => 'INT(6) NOT NULL',
]];

$i = 0;
foreach ($dbs_name as $name) {
    
    if (!db_table_exist($name)) {

        db_table_create($name, $dbs_data[$i]);
    }

    $i++;
}
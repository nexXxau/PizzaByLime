<?php

require_once '../functions.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $result['dishname'] = $_POST['dishname'];
    $result['ingredients'] = $_POST['ingredients'];
    $result['weights'] = $_POST['weights'];
    $result['json_ingredients'] = json_encode($result['ingredients']);
    $result['json_weights'] = json_encode($result['weights']);

    for ($i=0; $i < count($result['ingredients']); $i++) { 
        
        echo $result['ingredients'][$i] . ' ' . $result['weights'][$i] . '<br>';



        $data = array(
            'dishes_id' => $result['dishname'], 
            'product_id' => $result['ingredients'][$i],
            'weight' => $result['weights'][$i]
        );
        
        db_add('prod_in_dish', $data);
    }


    $data = array(
        'dishes_id' => $result['dishname'], 
        'product_id' => $result['json_ingredients'],
        'weight' => $result['json_weights']
    );
            
    db_add('prod_in_dish', $data);
    header('Location: /newcalc/');

    exit();
}

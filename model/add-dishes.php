<?php

require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dish_name = $_POST['dish_name'];
    $ingredients = $_POST['ingredients'];
    $weights = $_POST['weights'];

    // Insert dish name into 'dishes' table
    $dish_id = db_add('dishes', ['dishes_name' => $dish_name]);

    // Insert ingredients and weights into 'prod_in_dish' table
    for ($i = 0; $i < count($ingredients); $i++) {
        $product_id = $ingredients[$i];
        $weight = $weights[$i];
        db_add('prod_in_dish', ['product_id' => $product_id, 'dishes_id' => $dish_id, 'weight' => $weight]);
    }

    // Redirect to confirmation page
    header('Location: /newcalc/');
    exit;
}
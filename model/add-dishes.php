<?php

require_once '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dish_name = $_POST['dish_name'];

    db_add('dishes', ['dishes_name' => $dish_name]);

    // Redirect to confirmation page
    header('Location: /newcalc/');
    exit;
}
<?php

require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $price_per_kg = $_POST['price_per_kg'];
    $data = array('product_name' => $product_name, 'price_per_kg' => $price_per_kg);
    db_add('products', $data);
    header('Location: /newcalc/');
    exit();
}
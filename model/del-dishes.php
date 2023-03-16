<?php

require_once '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    db_del('dishes', $id);
    header('Location: /newcalc/');
    exit();
}
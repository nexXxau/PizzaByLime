<?php

require_once '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Redirect to confirmation page
    header('Location: /newcalc/');
    exit;
}
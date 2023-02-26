<?php

switch ($_SERVER['REQUEST_URI']) {
    case '/newcalc/':
        include 'templates/home.php';
        break;
    default:
        http_response_code(404);
        include 'templates/404.php';
        break;
}

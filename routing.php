<?php

switch ($_SERVER['REQUEST_URI']) {
    case '/':
        include 'templates/home.php';
        break;
    case '/stat':
        include 'templates/stat.php';
        break;
    default:
        http_response_code(404);
        include 'templates/404.php';
        break;
}

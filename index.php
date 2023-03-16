<?php 

require_once 'functions.php';
require_once 'routing.php';





$variable = db_read_allbyvalue('prod_in_dish', 'dishes_id', 3);




foreach ($variable as $value) {
    
    
    var_dump($value);
    echo '<br>';
}


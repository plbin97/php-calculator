<?php
include 'src/calculate.php';
if (file_get_contents('php://input') == ''){
    die("Error");
}else{
    $result = calculate(file_get_contents('php://input'));
    if($result === null) {
        die("Error");
    }else{
        echo $result;
    }
}
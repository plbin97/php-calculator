<?php
include 'src/calculate.php';

if (!isset($_GET['formula'])) {
    die("Error");
}else{
    $result = calculate($_GET['formula']);
    if($result == null) {
        die("Error");
    }else{
        echo $result;
    }
}
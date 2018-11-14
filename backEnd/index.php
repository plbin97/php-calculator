<?php
include 'src/calculate.php';

if (!isset($_POST['formula'])) {
    die("Error");
}else if ($_POST['formula'] == ''){
    die("Error");
}else{
    $result = calculate($_POST['formula']);
    if($result === null) {
        die("Error");
    }else{
        echo $result;
    }
}
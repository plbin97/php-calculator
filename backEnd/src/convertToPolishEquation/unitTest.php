<?php
include 'convertToPolishFormula.php';
//print_r(equationBreakDown("12+34*23.4+(4*77+2)*123"));

$arr = convertToPolishFormula("12+3.4*23.4+(4*77+2)*1.23^3");
foreach ($arr as $i) {
    echo $i . ' ';
}


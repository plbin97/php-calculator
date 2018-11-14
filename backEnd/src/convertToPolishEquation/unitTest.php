<?php
include 'convertToPolishFormula.php';
//print_r(equationBreakDown("12+34*23.4+(4*77+2)*123"));

print_r(convertToPolishFormula("12+3.4*23.4+(4*77+2)*1.23"));

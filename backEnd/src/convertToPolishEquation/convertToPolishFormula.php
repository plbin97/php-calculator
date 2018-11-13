<?php

require '../stack/stack.php';
require 'equationBreakDown.php';

function convertToPolishFormula($normalFormula) {
    /**
     * For converting the normal formula to polish notation formula
     */

    // Break down string to array
    $normalFormulaArray = equationBreakDown($normalFormula);
    if ($normalFormulaArray == null) {
        // If formula is not valid
        return null;
    }

    $operatorStack = new OperatorStack();  // Stack for operators

    $polishFormula = [];  // Array for polish formula

    foreach ($normalFormulaArray as $i) {  // Loop through all the element in normalFormula

        if (is_integer($i)) {
            // If the element is number, then push to polish formula
            array_push($polishFormula,$i);

        }else if ($i == '(') {
            array_push($polishFormula, $i);
        }else if($i == ')'){

        }else{
            if ($operatorStack->isEmpty()) {
                $operatorStack->push($i);
            }else{
                if ($operatorStack->)
            }
        }
    }


}
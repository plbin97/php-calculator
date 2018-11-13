<?php

include dirname(__FILE__) . '/../stack/operatorStack.php';
include 'equationBreakDown.php';

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
            // If opening parenthesis, push into stack
            $operatorStack->push($i);

        }else if($i == ')'){
            // if closing parenthesis, pop all the operator until an opening parenthesis
            while($operatorStack->whatsLast() != '(') {
                array_push($polishFormula,$operatorStack->pop());
            }

            $operatorStack->pop();  // Pop out the '('
        }else{

            // For operator

            if ($operatorStack->isEmpty()) {
                // If the stack is empty, push into stack
                $operatorStack->push($i);

            }else if(!$operatorStack->isNextPopHasHigherOrEqualPriorityThan($i)){
                $operatorStack->push($i);
            }else{
                while ($operatorStack->isNextPopHasHigherOrEqualPriorityThan($i)) {
                    // pop out all the operators with higher or equal priority than $i
                    if($operatorStack->whatsLast() == '(') {
                        // If there is an opening parenthesis, then break
                        $operatorStack->pop();
                        break;
                    }
                    if($operatorStack->isEmpty()) {
                        // If the stack is empty, then break
                        break;
                    }
                    array_push($polishFormula,$operatorStack->pop());
                }
                $operatorStack->push($i);
            }
        }
    }
    while (!$operatorStack->isEmpty()) {
        // Pop out the rest of operators in stack
        array_push($polishFormula,$operatorStack->pop());
    }

    return $polishFormula;


}
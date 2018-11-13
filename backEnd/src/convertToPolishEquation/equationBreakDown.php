<?php
function equationBreakDown($normalFormula) {
    /**
     * Break down formula in to array for futher calculation.
     * @param $normalFormula Formula in String
     * @return formula in Array, return null if formula is not valid
     */

    $normalFormula = str_replace(' ','',$normalFormula);  // Remove all the space

    $stack = [];  // Stack for storing numbers

    $breakedEquation = [];  // the array that would be returned


    for($i = 0;$i<strlen($normalFormula);$i++) {  // Handle each character


        if (is_numeric($normalFormula[$i])) {
            array_push($stack,$normalFormula[$i]);  // Do this if this character is number
        }else{

            // Not a number

            if (count($stack) == 0) {

                // No number in stack, means that the character only can be parenthesis, or the previous character is the closing parenthesis
                if ($normalFormula[$i] == '(' || $normalFormula[$i] == ')' || $breakedEquation[count($breakedEquation) - 1] == ')') {
                    array_push($breakedEquation,$normalFormula[$i]);
                }else {
                    return null;
                }


            }else{
                // The Stack is not empty, so that we should pop all the numbers out
                $temp = '';
                while (count($stack) != 0) {
                    $temp = array_pop($stack) . $temp;
                }
                try {
                    $numberAdd = (int)$temp;
                }catch (Exception $e) {
                    return null;
                }

                // Push the number and the operator to the breakedEquation
                array_push($breakedEquation,$numberAdd);
                array_push($breakedEquation,$normalFormula[$i]);
            }
        }
    }

    // After finished, check if there is any value in stack; if does have, pop them out.
    if(count($stack) != 0) {
        $temp = '';
        while (count($stack) != 0) {
            $temp = array_pop($stack) . $temp;
        }
        try {
            $numberAdd = (int)$temp;
        }catch (Exception $e) {
            return null;
        }
        array_push($breakedEquation,$numberAdd);
    }

    // Verify if the last character is number or closing parenthesis.
    $last = $breakedEquation[count($breakedEquation) - 1];
    if (!is_integer($last) && !($last == '(' || $last == ')')) {
        return null;
    }
    return $breakedEquation;
}
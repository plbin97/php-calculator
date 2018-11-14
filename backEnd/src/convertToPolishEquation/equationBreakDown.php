<?php
function equationBreakDown($normalFormula) {
    /**
     * Break down formula in to array for futher calculation.
     * @param $normalFormula Formula in String
     * @return formula in Array, return null if formula is not valid
     */

    $normalFormula = str_replace(' ','',$normalFormula);  // Remove all the space

    $stack = [];  // Stack for storing numbers

    $breakedFormula = [];  // the array that would be returned

    $stackForparenthesis = [];  // For parenthesis test


    for($i = 0;$i<strlen($normalFormula);$i++) {  // Handle each character


        // For parenthesis test
        if($normalFormula[$i] == '(') {
            array_push($stackForparenthesis,1);
        }
        if ($normalFormula[$i] == ')') {
            array_pop($stackForparenthesis);
        }

        if (is_numeric($normalFormula[$i]) || $normalFormula[$i] == '.') {
            array_push($stack,$normalFormula[$i]);  // Do this if this character is number or .
        }else if((!is_numeric($normalFormula[$i - 1])) && $normalFormula[$i] == '-'){
            array_push($stack,$normalFormula[$i]);  // if it is a negative number
        }else{

            // Not a number

            if (count($stack) == 0) {
                // No number in stack, means that the character only can be parenthesis, or the previous character is the closing parenthesis


                if ($normalFormula[$i] == '(' || $normalFormula[$i] == ')' || $breakedFormula[count($breakedFormula) - 1] == ')') {
                    array_push($breakedFormula,$normalFormula[$i]);
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
                    $numberAdd = (double)$temp;
                }catch (Exception $e) {
                    return null;
                }

                // Push the number and the operator to the breakedEquation
                array_push($breakedFormula,$numberAdd);
                array_push($breakedFormula,$normalFormula[$i]);
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
            $numberAdd = (double)$temp;
        }catch (Exception $e) {
            return null;
        }
        array_push($breakedFormula,$numberAdd);
    }

    // Verify if the last character is number or closing parenthesis.
    $last = $breakedFormula[count($breakedFormula) - 1];
    if (!is_numeric($last) && !($last == '(' || $last == ')')) {
        return null;
    }

    for($i = 0;$i < count($breakedFormula);$i++) {
        if (!isset($breakedFormula[$i - 1]) || !isset($breakedFormula[$i + 1])) {
            continue;
        }
        if ($breakedFormula[$i] == ')' && !is_numeric($breakedFormula[$i - 1])){
            return null;
        }
        if ($breakedFormula[$i] == '(' && !is_numeric($breakedFormula[$i + 1])) {
            return null;
        }
    }

    // For parenthesis test
    if (count($stackForparenthesis) != 0) {
        return null;
    }

    return $breakedFormula;
}
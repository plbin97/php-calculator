<?php
include 'stack/numberStack.php';
include 'convertToPolishEquation/convertToPolishFormula.php';

function calculate($normalFormula) {
    /**
     * Method for calculate the result
     * @param $normalFormula Normal Formula
     * @return result.
     * If the formula is invalid, @return null
     */

    $numberStack = new NumberStack();

    $polishFormula = convertToPolishFormula($normalFormula);

    // If the normalFormula has no error
    if ($polishFormula == null) {
        return null;
    }


    // Loop for each elements
    foreach ($polishFormula as $i) {

        // if number then push; if oeprator than calculate
        if (is_numeric($i)) {
            $numberStack->push($i);
        }else{
            if(!$numberStack ->calculate($i)) {
                return null;
            }
        }
    }

    // get the final result.
    return $numberStack->popResult();
}


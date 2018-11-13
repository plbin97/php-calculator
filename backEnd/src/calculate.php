<?php
require 'stack/numberStack.php';
require 'convertToPolishEquation/convertToPolishFormula.php';

function calculate($normalFormula) {
    /**
     * Method for calculate the result
     * @param $normalFormula Normal Formula
     * @return result.
     * If the formula is invalid, @return null
     */

    $numberStack = new NumberStack();

    $polishFormula = convertToPolishFormula($normalFormula);
    if ($polishFormula == null) {
        return null;
    }


    foreach ($polishFormula as $i) {
        if (is_integer($i)) {
            $numberStack->push($i);
        }else{
            $numberStack ->calculate($i);
        }
    }

    return $numberStack->popResult();
}


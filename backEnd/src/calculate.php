<?php

function calculate($normalFormula) {
    /**
     * Method for calculate the result
     * @param $normalFormula Normal Formula
     * @return result.
     * If the formula is invalid, @return null
     */

    $numberStack = [];

    foreach ($normalFormula as $i) {
        if (is_integer($i)) {
            array_push($numberStack,$i);
        }else{
            $number1 = array_pop($numberStack);
            $number2 = array_pop($numberStack);

        }
    }
}

function simpleCalculation

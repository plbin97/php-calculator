<?php
/**
 * For converting the normal equation to polish equation
 */

function convertToPolishEquation($normalEquation) {

}

function equationBreakDown($normalEquation) {
    $breakDownArray = explode("*",$normalEquation);
    return $breakDownArray;
}
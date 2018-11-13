<?php
/**
 * Stack for calculation
 */

class OperatorStack
{

    private $list = [];  // Stack

    private $operatorList = [];  // List for storing operators and their priority

    function __construct() {
        // Put operators and priority into the array.
        // The priority start from 1(loweat) to 3(hightest)

        $this->operatorList['+'] = 1;  // For addition
        $this->operatorList['-'] = 1;  // For subtraction
        $this->operatorList['*'] = 2;  // For multiplication
        $this->operatorList['/'] = 2;  // For division
        $this->operatorList['%'] = 2;  // For modulo
        $this->operatorList['^'] = 3;  // For exponentiation
        $this->operatorList['&'] = 3;  // For root

        // Bracket is the special operators. The priority is meaningless.
        $this->operatorList['('] = 4;
        $this->operatorList[')'] = 4;
    }

    function isOperator($operator) {
        return array_key_exists($operator,$this->operatorList);
    }
    function push($operator) {
        /**
         * Push into stack
         * @param $operator Element that would be push in.
         */
        array_push($this->list,$operator);
    }
    function pop() {
        /**
         * Pop from stack
         * @return last element; if the stack is empty, it would return null
         */
        if (count($this->list) != 0) {
            return array_pop($this->list);
        }else{
            return null;
        }
    }
    function isEmpty() {
        /**
         * @return true if the stack is empty
         */
        return count($this->list) == 0;
    }
    function whatsLast() {
        /**
         * Get the last element, but not pop out.
         * @return last element; if the stack is empty, it would return null
         */
        if (count($this->list) != 0) {
            return $this->list[count($this->list) -  1];
        }else{
            return null;
        }
    }
    function isNextPopHasLowerPriorityThan($operator) {
        /**
         * as function name said
         * @param $operator Operator
         * @return true if yes, return false is not.
         * ALso, return false if the parameter is not a operator or empty
         */
        if ($this->isOperator($operator)) {
            return false;
        }
        if ($this->isEmpty()) {
            return false;
        }
        return $this->operatorList[$operator] > $this->whatsLast();
    }
}
<?php
/**
 * Stack for calculation
 */

class NumberStack
{
    private $stack = [];  // Stack for storing number

    function push($number) {
        /**
         * Push to stack
         * @param $number number that would be pushed into
         */
        array_push($this->stack,$number);
    }
    function calculate($operator) {

        /**
         * Make calculation for the first two numbers pop from the stack; calculate them by operator, and push back.
         * @param $operator the operator for calculation
         * @return true if success, return false if error
         */

        // First two numbers
        $number2 = array_pop($this->stack);
        $number1 = array_pop($this->stack);

        // For different operators
        switch ($operator) {

            case '+':
                array_push($this->stack,$number1 + $number2);
                break;

            case '-':
                array_push($this->stack,$number1 - $number2);
                break;

            case '*':
                array_push($this->stack,$number1 * $number2);
                break;

            case '/':
                if ($number2 == 0) {  //
                    return false;
                }
                array_push($this->stack,$number1 / $number2);
                break;

            case '%':
                array_push($this->stack,$number1 % $number2);
                break;

            case '^':
                array_push($this->stack,pow($number1,$number2));
                break;

            case '&':
                if ($number2 < 0) {
                    return false;
                }
                array_push($this->stack, sqrt($number2));
                break;

        }
        return true;
    }
    function popResult() {
        /**
         * Pop the result; would be called in the final step of the calculation
         * @return last number
         */
        return array_pop($this->stack);
    }
}
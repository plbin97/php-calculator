<?php
/**
 * Stack for calculation
 */

class NumberStack
{
    private $stack = [];

    function push($number) {
        array_push($this->stack,$number);
    }
    function calculate($operator) {

        $number2 = array_pop($this->stack);
        $number1 = array_pop($this->stack);
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
                array_push($this->stack,$number1 / $number2);
                break;

            case '%':
                array_push($this->stack,$number1 % $number2);
                break;

            case '^':
                array_push($this->stack,$number1 ^ $number2);
                break;

            case '&':
                array_push($this->stack, sqrt($number2));
                break;

        }
    }
    function popResult() {
        return array_pop($this->stack);
    }
}
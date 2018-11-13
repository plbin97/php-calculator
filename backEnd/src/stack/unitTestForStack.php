<?php
require 'operatorStack.php';
$test = new OperatorStack();
$test->push('^');
$test->push('*');
if ($test->pop() != '*') {
    die("Error");
}
if (!$test->isOperator("+")) {
    die("Error");
}
if (!$test->isNextPopHasHigherOrEqualPriorityThan("+")) {
    die("Error");
}

echo "Pass";
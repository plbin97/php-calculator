<?php
require 'stack.php';
$test = new OperatorStack();
$test->push('^');
$test->push('*');
if ($test->pop() != '*') {
    die("Error");
}
if (!$test->isOperator("+")) {
    die("Error");
}
if ($test->isNextPopHasLowerPriorityThan("+")) {
    die("Error");
}
echo "Pass";
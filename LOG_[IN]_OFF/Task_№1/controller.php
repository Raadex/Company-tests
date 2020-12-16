<?php
require_once 'calculate.php';
if (isset($_POST) && isset($_POST["number1"]) && isset($_POST["number2"])) {
    $num1 = $_POST["number1"];
    $num2 = $_POST["number2"];
    $operand = $_POST["operations"];
    $result = "";
    switch ($operand) {
        case 1:
            $result = Calculate::sum($num1, $num2);
            break;
        case 2:
            $result = Calculate::diff($num1, $num2);
            break;
        case 3:
            $result = Calculate::mult($num1, $num2);
            break;
        case 4:
            $result = Calculate::div($num1, $num2);
            break;
    }
    echo $result;

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra?answer=$result");
}
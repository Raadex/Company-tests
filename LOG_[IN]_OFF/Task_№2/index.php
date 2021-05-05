<?php

if (isset($_POST) && is_numeric($_POST["number1"]) && is_numeric($_POST["number2"])) {
    $num1 = $_POST["number1"];
    $num2 = $_POST["number2"];
    $operand = $_POST["operations"];
    $result = "";
    switch ($operand) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = $num2 == 0 ? "на 0 делить нельзя" : $num1 / $num2;
            break;
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Тег SELECT</title>
</head>
<body>
<form action="" method="POST">
    <input type="number" name="number1" step="0.001">
    <select name="operations" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="number2" step="0.001">
    <input type="submit" value="=">
    <?php if (isset($result)) : ?>
    <p>Ответ: <?= "{$num1} {$operand} {$num2} = {$result}" ?></p>
    <?php endif ?>
</form>
</body>
</html>
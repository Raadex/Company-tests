<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег SELECT</title>
 </head>
 <body>
    <form action="controller.php" method="POST">
        <input type="number" name="number1">
        <select name="operations" id="">
            <option value="1">+</option>
            <option value="2">-</option>
            <option value="3">*</option>
            <option value="4">/</option>
        </select>
        <input type="number" name="number2">
        <input type="submit" value="=">
        <?php if (!empty($_GET['answer'])){ ?>
            <p>Ответ: <?= $_GET['answer'] ?></p>
        <?php }?>
    </form>
 </body>
</html>
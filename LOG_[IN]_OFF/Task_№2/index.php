<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег SELECT</title>
 </head>
 <body>
 <img src="image.php"/>
 <?php if (!empty($_COOKIE['count_view'])): ?>
    <p>Просмотров: <?= $_COOKIE['count_view'] ?></p>
 <?php endif; ?>
 </body>
</html>
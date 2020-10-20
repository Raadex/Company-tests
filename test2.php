<?php
/**
* получение имен пользователей
* @param string $user_ids
* @return array
*/
function load_users_data(string $user_ids) {
    //$user_ids = explode(',', $user_ids);
      $db = mysqli_connect("localhost", "root", "123123", "database");
      $usrs = mysqli_query($db, "SELECT * FROM users WHERE id IN ($user_ids)");
    $data = [];
    foreach ($usrs as $usr) {
        while($obj = $usrs->fetch_object()){
            $data[$obj->id] = $obj->name;
        }
    }
      mysqli_close($db);
      return $data;
  
  }
  // Как правило, в $_GET['user_ids'] должна приходить строка
  // с номерами пользователей через запятую, например: 1,2,17,48
  $data = load_users_data($_GET['user_ids']);
  foreach ($data as $user_id=>$name) {
      echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
  }
//поскольку функция отвечает за получение данных из бд по id пользователей, то предполагается, что на вход гарантировано будут переданы ids пользвоателей,
//поэтому мы не бдуем проверять входные данные
//нет необходимости разбивать строку id на массив, её можно просто подставить в запрос, поэтому мы можем свести  count($user_ids) запросов к 1
//также нет необходимости каждый раз открывать и закрывать соединение между запросами, это сильно нагрузит БД при большом количестве запросов
//данные от БД рекомендуется храниться в файлах конфигах, от куда можно легко их поменять на данные от тестовой БД на время разработки
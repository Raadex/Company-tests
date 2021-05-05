<?php

if (!empty($_COOKIE['count_view'])) {
    setcookie('count_view', $_COOKIE['count_view'] + 1, time() + 86400);
} else {
    setcookie('count_view', 1, time() + 86400 );
}

$img = 'image.png';

if (file_exists($img)) {
    header('Content-Type: image/png');
    header('Content-Length: ' . filesize($img));
    readfile($img);
} else {
    setcookie('count_view', null, -1);
}

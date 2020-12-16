<?php
if (!empty($_COOKIE['count_view'])) {
    setcookie('count_view',$_COOKIE['count_view'] + 1, time() + 86400);
} else {
    setcookie('count_view', 1, time() + 86400 );
}
$img = 'image.png';
header('content-type: image/png');
readfile($img);
<?php
/**
* Формируется и везвращается валидный URL на корень указанного в ссылке хоста. 
* @param string $url
* @param mixed $delValue optional parametr of foo
* @param mixed $sort optional parametr of foo
* @return string
*/
function newUrl($url, $delValue = null, $sort = null) {
    $url_ar = parse_url($url);
    mb_parse_str($url_ar['query'], $result);

    //если существует  элемент для удаления, то удаляем этот элемент из массива url_ar['query']
    if (isset($delValue)) {
      $result = array_filter($result, function($value) use ($delValue) {
        return $value != $delValue;
      });
    }
    //если указана сортировка, то сортируем, если параметр не был передан или было передано значение, отличное от asc и desc, то сортировки не будет
    if (isset($sort) && ($sort == 'asc' || $sort == 'desc')) {
        $sort == 'asc' ? asort($result) : arsort($result);
    } 
    $get_params = "?";
    //представляем result в виде строки
    foreach ($result as $param => $value) {
        $get_params .= $param . "=" . $value . "&";
    }
    //собираем результрущий url
    $res_url = $url_ar['scheme'] . "://" . $url_ar['host'] . '/' . $get_params;

    //заменяем все / на $2F и добавляем полученную строку в конец результирующей строки
    if (!empty($url_ar['path'])) {
        $path = str_replace('/', '$2F' ,$url_ar['path']);
        $res_url .= 'url=' . $path;
    }

    return $res_url;
}
/*$url = "https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3";
$res = newUrl($url, 3, 'asc');
var_dump($res);*/
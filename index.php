<?php
//!!! Пользовательская страница !!!
include 'gullEngine/core.php';
include 'gullEngine/dataControler.php';

$contentIndex;

$logo = 'image/logo.png';     //путь к лого

//читаем из базы данных
$menuArray = readMenuButton(); //пункты менюшки
$content = readContent(0);  //контент
$cpy = readCopyr(0);        //текст для копирайтинга
$footArray = readFooter(0); //футер

FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 0);//собираем сайт

?>

<script>
       menuEvent(0);//вешаем события на пунктах меню 
</script>
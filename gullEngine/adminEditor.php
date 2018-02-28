<?php
//!!!  Админка    !!!
session_start(); //лого
$logo = '../image/logo.png';//пункты менюшки
$menuArray = readMenuButton();//контент
$content = readContent(0);//текст для копирайтинга
//футер
$cpy = readCopyr(1);
$footArray = readFooter(1);

//поехали!
FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 1);

?>

<script>
    menuEvent(1);
    //ниже поделючаем js отправляющий запросы для редактирвоания сайта
</script>
<script src="../js/GullEngineAdmin.js"></script>

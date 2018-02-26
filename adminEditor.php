<?php


session_start();
include 'gullEngine/dataControler.php';
require_once('gullEngine/core.php');
//лого
$logo= readLogo(1);
//пункты менюшки
$menuArray=readMenuButton();
//контент
$content=readContent(4);
//текст для копирайтинга
$cpy=readCopyr(1);
//футер
$footArray=readFooter(1);

//поехали!
 FullAsembly($logo, $menuArray, $cpy,$content,$footArray, 0, 1);

?>
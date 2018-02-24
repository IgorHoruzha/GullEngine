<?php
   include 'gullEngine/core.php';
    //лого
    $logo ='image/logo.png';
    //пункты менюшки
    $menuArray[0] = array("name"=>"Home","link"=>"https://www.google.com.ua");
    $menuArray[1] = array("name"=>"Page 1","link"=>"https://www.google.com.ua");
    $menuArray[2] = array("name"=>"Page 2","link"=>"https://www.google.com.ua");

    // картинки с соцсетями в футере
    $footArray[0] = array("link"=>"https://vk.com","image"=>"image/socialImages/vk.png");
    $footArray[1] = array("link"=>"https://www.facebook.com","image"=>"image/socialImages/facebook.png");
    $footArray[2] = array("link"=>"https://twitter.com","image"=>"image/socialImages/twiter.png");
    //текст для копирайтинга
    $cpy = "Copyright © 2017";

   //поехали!
   FullAsembly($logo, $menuArray,$cpy, $footArray,0,0);
   
?>
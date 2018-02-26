<?php

//TODO: DO NOT WORK.
//foreach ($_POST as $key => $value) {
//
//    echo 12;
//    if ($key == 'menuButtonInfo') {
//        $tmpObj = $value;
//        echo 12;
//    }
//}
//if ($tmpObj) {
//    $mButton = $tmpObj;
//    echo 12;
//}
include 'gullEngine/core.php';
include 'gullEngine/dataControler.php';


$contentIndex;


//лого
$logo = readLogo(0);
//пункты менюшки
$menuArray = readMenuButton();
//контент
$content = readContent(0);
//текст для копирайтинга
$cpy = readCopyr(0);
//футер
$footArray = readFooter(0);

FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 0);


?>

<script>

    $('.nav-link').click(function (e) {


        var len = $('.nav-link').length;
        var currentMenuButton;
        //узнаю какая это картинка из всех
        for (var i = 0; i < len; i++) {

            if (e.target.innerText == $('.nav-link')[i].text) {
                currentMenuButton = i;
            }
        }


        function getServerAnswer(x) {

        $('#siteContent').replaceWith(x);
        }

        var strReqest = {"reqObj": '' + currentMenuButton};
        $.post("tmpPhpServer.php", strReqest, getServerAnswer, "HTML");

    });


</script>
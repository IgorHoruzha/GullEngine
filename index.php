<?php

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


 function menuEvent(){
//       $('.nav-link').click(function (e) {

//         var currentMenuButton= $(e.currentTarget);    
//         function getServerAnswer(x) {
//           $($('.navbar')[0]).replaceWith(x.menu);
//           $('#siteContent').replaceWith(x.content);
//           menuEvent();
//         }
        
//         var cNumber=0;
//         for (var i = 0; i < $('.nav-link').length; i++) {
//             if (e.target.innerText == $('.nav-link')[i].text) {
//                cNumber = i;
//             }
//         }
//         var obj = new function(){
//         	this.menuButton=currentMenuButton.children().text();
//             this.number=cNumber;
//             this.type=0;
//         }
//         var jr=JSON.stringify(obj);
//         var strReqest = {"reqObj":jr};
//         $.post("tmpPhpServer.php",strReqest,getServerAnswer,"JSON");
       

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
  }
   menuEvent();

</script>
<?php

session_start();
//лого
$logo= readLogo(1);
//пункты менюшки
$menuArray=readMenuButton();
//контент
$content=readContent(0);
//текст для копирайтинга
$cpy=readCopyr(1);
//футер
$footArray=readFooter(1);
//поехали!
 FullAsembly($logo, $menuArray, $cpy,$content,$footArray, 0, 1);
?>

<script>

    $('.nav-link').click(function (e) {

        var len = $('.nav-link').length;
        var currentMenuButton;
        //узнаю какая это кнопка из всех
        for (var i = 0; i < len; i++) {

            if (e.target.innerText == $('.nav-link')[i].text) {
                currentMenuButton = i;
            }
        }
        function getServerAnswer(x) {
          $('#siteContent').replaceWith(x);
        }
        var strReqest = {"reqObj": '' + currentMenuButton};
        $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "HTML");

    });


    $('#appendSocial').click(function (e) {
        var sLink=$('#socialLinkInput').val();
        var imgPath=$('#socialLinkInput').val();
    });
    $('#changeLogo').click(function (e) {
        var imgPath=$('#logoImage').val();
        alert(imgPath);
    });
    $('#changeCopyright').click(function (e) {
        var cpyText=$('#copyrightInput').val();
 
    });
    $('appendMenuButtons').click(function (e) {
        var mName=$('#menuLinkInput').val();
        var mContent=$('#menuLinkInput').val();
    });
  

</script>

//TODO: NEED EDIT HERE.
<?php
include 'gullEngine/core.php';
include 'gullEngine/dataControler.php';

$contentIndex;

$logo = readLogo(0);        //лого
$menuArray = readMenuButton();   //пункты менюшки
$content = readContent(0);  //контент
$cpy = readCopyr(0);        //текст для копирайтинга
$footArray = readFooter(0); //футер

FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 0);

?>

<script>
    function menuEvent() {

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
            console.dir(x);
                $('#siteContent').replaceWith(x);
            }

            var strReqest = {"reqObj": '' + currentMenuButton};
            $.post("tmpPhpServer.php", strReqest, getServerAnswer, "HTML");

        });
    }

    menuEvent();
</script>
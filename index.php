<?php
include 'gullEngine/core.php';
include 'gullEngine/dataControler.php';
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
      $('.nav-link').click(function (e) {

        var currentMenuButton= $(e.currentTarget);    
        function getServerAnswer(x) {
          $($('.navbar')[0]).replaceWith(x.menu);
          $('#siteContent').replaceWith(x.content);
          menuEvent();
        }
        
        var cNumber=0;
        for (var i = 0; i < $('.nav-link').length; i++) {
            if (e.target.innerText == $('.nav-link')[i].text) {
               cNumber = i;
            }
        }
        var obj = new function(){
        	this.menuButton=currentMenuButton.children().text();
            this.number=cNumber;
            this.type=0;
        }
        var jr=JSON.stringify(obj);
        var strReqest = {"reqObj":jr};
        $.post("tmpPhpServer.php",strReqest,getServerAnswer,"JSON");
       
    });
  }
   menuEvent();

</script>
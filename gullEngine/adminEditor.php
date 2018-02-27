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
                    this.type=1;
                }
                var jr=JSON.stringify(obj);
                var strReqest = {"reqObj":jr};
                $.post("../tmpPhpServer.php",strReqest,getServerAnswer,"JSON");
               
            });
      }
      menuEvent();

    function reqestObject(){
            this.type;
            this.value;
    }
    $('#appendSocial').click(function (e) {
        var sLink=$('#socialLinkInput').val();
        var imgPath=$('#socialLinkInput').val();
    });
    $('#changeLogo').click(function (e) {
        var imgPath=$('#logoImage').val();
        alert(imgPath);
    });

    //работает
    $('#changeCopyright').click(function (e) {
        var cpyText=$('#copyrightInput').val();     
        var editOb = new reqestObject();
        editOb.type ='copyright';
        editOb.value = cpyText;
        var jsonEdit=JSON.stringify(editOb);
        var strReqest = {"objectToAdd":jsonEdit};
        function getServerAnswer(x) {
          $('#copyrite').html('<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#copyrightModale"  data-whatever="@mdo" id="editCopyrite">Edit</button>'+x);
        }
        $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "HTML");
    });
    
   //работает
    $('#appendMenuButtons').click(function (e) {
        var mName=$('#menuNameInput').val();
        var mContent=$('#menuLinkInput').val();
        var editOb = new reqestObject();

        editOb.type ='munuButton';
        editOb.name = mName;
        editOb.content = mContent;
        var jsonEdit=JSON.stringify(editOb);
        var strReqest = {"objectToAdd":jsonEdit};
        function getServerAnswer(x) {
             console.log(x);
        }
        $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "HTML");

    });
  

</script>
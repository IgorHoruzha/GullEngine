<?php
    include 'gullEngine/core.php';
    include 'gullEngine/dataControler.php';


         //лого
    $logo= readLogo(0);
    //пункты менюшки
    $menuArray=readMenuButton();
    //контент
    $content=readContent(4);
    //текст для копирайтинга
    $cpy=readCopyr(0);
    //футер
    $footArray=readFooter(0);

    FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 0);
     




    foreach ($_POST as $key=>$value){
        if($key=='menuButtonInfo'){
            $tmpObj = $value;
        }
    }

    $mButton= $tmpObj;
    echo $mButton;
     
?>

<script>


    $('.nav-link').click(function(){
          
                var len=$('.nav-link').length;
                var currentMenuButton;
                //узнаю какая это картинка из всех
                for(var i=0;i<len;i++){
                  if($(event.currentTarget).text()==$($('.nav-link')[i]).text()){
                    currentMenuButton='button index'+i;
                  }
                }
                function getServerAnswer(x){
                     console.dir(x);
                }
               var strReqest = {"reqObj":''+currentMenuButton};
               $.post("index.php",strReqest,getServerAnswer,"JSON");
               alert('Хуй');
    });


</script>
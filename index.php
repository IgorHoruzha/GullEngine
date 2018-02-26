<?php
    include 'gullEngine/core.php';
    include 'gullEngine/dataControler.php';
    //пункты менюшки
    $menuArray = [];  
    //лого
    $logo ='../image/logo.png';
    //поехали!
     
     $menuArray=readMenuButton();
     $footArray=readFooter(0);
     $content=readContent(4);

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
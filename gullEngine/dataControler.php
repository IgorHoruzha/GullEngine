<?php

 //добавить в футер буттон
  function addmenuButton($name,$link){
  	    $im=$name;
  	    $lin=$link;
  	    // подключаемся к серверу
	    $link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    // создание строки запроса
	    $query ="INSERT INTO MenuButtons VALUES('$im','$lin')";
	    // выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	        echo "<span style='color:blue;'>Данные добавлены</span>";
	    }
	    mysqli_close($link);
  }
  function readMenuButton(){
	  	$link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    $query ="SELECT * FROM MenuButtons";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	    	    $footArray;
	            $counts = mysqli_num_rows($result);
	            for ($i=0; $i <  $counts; $i++) { 
	               $row = mysqli_fetch_row($result);
	               $colum =0;
	               $name='';
	               foreach ($row as $key => $value) {
	                    switch ($colum) {

	                        case 0: $name='name';
	                            break;
	                        case 1: $name='link';
	                            # code...
	                            break;        
	                        default:
	                            # code...
	                            break;
	                    }
	                    $modStr='';
	                    if($mod==0){
	                        $modStr='';
	                    }
	                    else{
	                        $modStr='../';
	                    }
	                    $footArray[$i][$name]=$modStr.$row[$colum];
	                    $colum++;
	               }
	            }
	            mysqli_free_result($result);
	            return  $footArray;
	    }
	     mysqli_close($link);
  }

  function addContent($content){
       // подключаемся к серверу
	    $link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    // создание строки запроса
	    $query ="INSERT INTO content VALUES('$content')";
	    // выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	        echo "<span style='color:blue;'>Данные добавлены</span>";
	    }
	    mysqli_close($link);
  } 

  function readContent($indx){
      
       	$link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    $query ="SELECT * FROM content";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	    	    $content;
	            $counts = mysqli_num_rows($result);
	            for ($i=0; $i <  $counts; $i++) { 
	               $row = mysqli_fetch_row($result);
	               $colum =0;
	               foreach ($row as $key => $value) {
	                    
	                    if($i==$indx){
                          $content=$modStr.$row[$colum];
                        }
	                    $colum++;	                   
	               }

	            }
	            mysqli_free_result($result);
	            return  $content;
	    }
  }

  //добавить в футер буттон
  function addToFooter($img,$link){
  	    $im=$img;
  	    $lin=$link;
  	    // подключаемся к серверу
	    $link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    // создание строки запроса
	    $query ="INSERT INTO FooterButons VALUES('$im','$lin')";
	    // выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	        echo "<span style='color:blue;'>Данные добавлены</span>";
	    }
	    mysqli_close($link);
  }
  //чтение футера и збазы данных
  function readFooter($mod){
	  	$link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    $query ="SELECT * FROM FooterButons";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	    	    $footArray;
	            $counts = mysqli_num_rows($result);
	            for ($i=0; $i <  $counts; $i++) { 
	               $row = mysqli_fetch_row($result);
	               $colum =0;
	               $name='';
	               foreach ($row as $key => $value) {
	                    switch ($colum) {

	                        case 0: $name='image';
	                            break;
	                        case 1: $name='link';
	                            # code...
	                            break;        
	                        default:
	                            # code...
	                            break;
	                    }
	                    $modStr='';
	                    if($mod==0){
	                        $modStr='';
	                    }
	                    else{
	                        $modStr='../';
	                    }
	                    $footArray[$i][$name]=$modStr.$row[$colum];
	                    $colum++;
	               }
	            }
	            mysqli_free_result($result);
	            return  $footArray;
	    }
	     mysqli_close($link);
  }
?>
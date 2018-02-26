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
	    $query ="SELECT NAME FROM MenuButtons";
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
	    $query ="SELECT LINING FROM Content WHERE MENU_ID={$indx}";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
//	    if($result)
//	    {
//	    	    $content;
//	            $counts = mysqli_num_rows($result);
//	            for ($i=0; $i <  $counts; $i++) {
//	               $row = mysqli_fetch_row($result);
//	               $colum =0;
//	               foreach ($row as $key => $value) {
//
//	                    if($i==$indx){
//                          $content=$modStr.$row[$colum];
//                        }
//	                    $colum++;
//	               }
//
//	            }
//	            mysqli_free_result($result);
        //TODO: NEED Checking Checking here
      return  $result->fetch_all()[0][0];

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
	                    if($mod==0 || $name=="link"){
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

   function addLogo($content){
	    $text = $content;
	 
		// открываем файл, если файл не существует,
		//делается попытка создать его
		$fp = fopen("Design.txt", "w");
		 
		// записываем в файл текст
		fwrite($fp, $text);	 
		// закрываем
		fclose($fp);
  } 

  function readLogo($mod){
        if($mod==0){
            $file = 'Design.txt';
        }
        else{
        	$file = '../Design.txt';
        }
      
		
  	
// Открываем файл для получения существующего содержимого
        $current = file_get_contents($file);
        if($mod==0){
        	return $current;
        }
        else{
        	return '../'.$current;
        }
  }
  function setCopyr($cpy){          
        $text = $cpy;
        $fp = fopen("/Cpyriting.txt", "w");
        fwrite($fp, $text);	 
		fclose($fp);
  }
  function readCopyr($mod){
        if($mod==0){
            $file = 'Cpyriting.txt';
        }
        else{
        	$file = '../Cpyriting.txt';
        }
        $current = file_get_contents($file);
        return $current; 
  }
?>
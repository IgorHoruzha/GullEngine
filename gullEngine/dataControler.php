<?php

  //добавить кнопку меню в базу данных
  function addmenuButton($id,$name,$link){
  	    $im=$name;
  	    $lin=$link;

  	    // подключаемся к серверу
	    $link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    // создание строки запроса
	    $query ="INSERT INTO MenuButtons VALUES({$id},'$im','$lin')";
	    // выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	        echo "<span style='color:blue;'>Данные добавлены</span>";
	    }
	    mysqli_close($link);
  }
  //возврашает масив кнопок меню из базы
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
  //добавляет контент в базу данных
  function addContent($shId,$menuСhain,$content){
       // подключаемся к серверу
	    $link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    // создание строки запроса
	    $query ="INSERT INTO content VALUES({$shId},{$menuСhain},'$content')";
	    // выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	        echo "<span style='color:blue;'>Данные добавлены</span>";
	    }
	    mysqli_close($link);
  } 
   //возврашает контент из базы данных по индексу
  function readContent($indx){
      
       	$link = mysqli_connect('localhost','root','','GullDataBase') 
	        or die("Ошибка " . mysqli_error($link)); 
	    $query ="SELECT LINING FROM Content WHERE MENU_ID={$indx}";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
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
  //чтение футера из базы данных
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
   //перезаписывает путь к логотипу
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
   //возврашает путь к логотипу
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
 //перезаписать текст копирайтинга 
  function setCopyr($cpy){          
        $text = $cpy;
        $fp = fopen("Cpyriting.txt", "w");
        fwrite($fp, $text);	 
		fclose($fp);
  }
  //возврашает текст копирайтинга
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
  
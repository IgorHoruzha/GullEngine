<?php
include 'gullEngine/core.php';
include 'gullEngine/dataControler.php';
if(isset($_POST['reqObj'])) {
     $obj= json_decode(($_POST['reqObj']));
     $link = mysqli_connect('localhost','root','','GullDataBase');    
     $query="SELECT ID FROM MenuButtons WHERE NAME ='{$obj->menuButton}'";
     $result = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link)); 
     $menuId=$result->fetch_all()[0][0];
     mysqli_close($link);
     $toBack = new class {
        public $menu ="";
        public $content ="";
        public $type ="";
     };

     $toBack->menu =  AssemblyMenu(readMenuButton(),$obj->number,$obj->type);
     $toBack->content = AssemblyContent(readContent($menuId));
     $toBack->type =  $obj->type;
     echo  json_encode($toBack);
}

if(isset($_POST['objectToAdd'])) {

     $editParams=json_decode($_POST['objectToAdd']);
     switch ($editParams->type) {
        //редакт копирайтинга
     	case 'copyright':{
            setCopyr($editParams->value);
            echo $editParams->value;
     	} 
     		break;
        //редакт мню
     	case 'munuButton':{
            $link = mysqli_connect('localhost','root','','GullDataBase');
	      
	        $query='SELECT ID FROM MenuButtons ORDER BY ID DESC LIMIT 1';
	        $result = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link)); 
            
            $menuId=$result->fetch_all()[0][0]+1;

            addmenuButton($menuId,$editParams->name,'?id='.$editParams->name);

            $query='SELECT ID FROM Content ORDER BY ID DESC LIMIT 1';
	        $result = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));

            mysqli_close($link);
            $contentId=$result->fetch_all()[0][0]+1;
            addContent($contentId,$menuId,$editParams->content);
            mysqli_close($link);
            echo (AssemblyMenu(readFooter(0), $contentId,0));                
     	}
     		break;
     	default:
     		break;
     }
}

if( isset( $_POST['my_file_upload'] ) ){  
    // ВАЖНО! тут должны быть все проверки безопасности передавемых файлов и вывести ошибки если нужно

    $uploaddir = './image'; // . - текущая папка где находится submit.php
    // cоздадим папку если её нет
    $files      = $_FILES; // полученные файлы
    $done_files = array();
    // переместим файлы из временной директории в указанную
    foreach( $files as $file ){
        $file_name = 'logo.png';
        if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
            $done_files[] = realpath( "$uploaddir/$file_name" );
        }
    }
    $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');
    die( json_encode( $data ) );
}




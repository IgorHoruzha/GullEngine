<?php

///!!! ПРОСТО СЕРВЕР !!!
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
            	      
	        $query='SELECT ID FROM MenuButtons ORDER BY ID DESC LIMIT 1';           
            $menuId=DateBaseQuery($query)->fetch_all()[0][0]+1;

            $query='SELECT priority FROM MenuButtons ORDER BY priority DESC LIMIT 1';
            $menuPriority=DateBaseQuery($query)->fetch_all()[0][0]+1;
            addmenuButton($menuId,$editParams->name,'?id='.$editParams->name,$menuPriority);

            $query='SELECT ID FROM Content ORDER BY ID DESC LIMIT 1';
	        $contentId=DateBaseQuery($query)->fetch_all()[0][0]+1;

            addContent($contentId,$menuId,$editParams->content,$menuId);
           
             
                  $toBack = new class {
                    public $menu ="";
                    public $content ="";
                    public $type ="";
                 };

             $toBack->menu = AssemblyMenu(readMenuButton(),$contentId,1);
             $toBack->content = AssemblyContent(readContent($menuId));
             $toBack->type =  $obj->type;
             echo  json_encode($toBack);
                    
     	}
     		break;
     	default:
     		break;
     }
}

if( isset( $_POST['changeLogoFile'] ) ){  

    $uploaddir = './image';
    $files      = $_FILES; // полученные файлы
    $file_name ='logo.png';

    move_uploaded_file( $files[0]['tmp_name'],"$uploaddir/$file_name" );
    
    $data =  array('files' => 'teeeest');
    die( json_encode( $data ) );
}

if( isset( $_POST['addSocialFile'] ) ){  

    $uploaddir = './image/socialImages';
    $files = $_FILES;
    addToFooter('image/socialImages/'.$files[0]['name'],$_POST['socialImageLink']);
    
    $file_name =$files[0]['name'];
    move_uploaded_file( $files[0]['tmp_name'],"$uploaddir/$file_name" );   
    $test = AssemblyFooter(readFooter(1),readCopyr(1),1);
    $data =  array('files' => $test);
    echo json_encode( $data );
}


if( isset( $_POST['changeBackgroundFile'] ) ){  

    $uploaddir = './image';
    $files      = $_FILES; // полученные файлы
    $file_name ='background.jpg';

    move_uploaded_file( $files[0]['tmp_name'],"$uploaddir/$file_name" );

    $data =  array('files' => 'teeeest');
    die( json_encode( $data ) );
}
?>



<?php
   
   //возвращает хедер !
   //принимает 0 для обычного режима и 1 для админ мода
	function siteHeader($mode){

      if($mode==0){
        return '<!DOCTYPE html>
                <html lang="en">
                <head>

                    <meta charset="UTF-8">
                    <title>gullPreviev</title>

                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  
                    <link href="css/bootstrap.min.css" rel="stylesheet">
                    <link href="css/style.css" rel="stylesheet">

                    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>

                </head>';
      }
      else{

        return '
                    <!DOCTYPE html>
                      <html lang="en">
                      <head>

                          <meta charset="UTF-8">
                          <title>gullPreviev</title>

                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        
                          <link href="../css/bootstrap.min.css" rel="stylesheet">
                          <link href="../css/style.css" rel="stylesheet">

                          <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
                          <script src="../js/bootstrap.min.js"></script>

                      </head>';
      }

	}

	//возврашает логотип сайта
    function setLogo($logoSrc){
    	return '<img src="'.$logoSrc.'" id="logo"/>';
    }

   // принимает асициативный масив с именами пунктов меню и их ссылками.
   //возвращает собранное нав-бар меню.
   function AssemblyMenu($obj,$inactiveMenuIndex){
        $rt='<nav class="navbar navbar-expand-lg navbar-light ">
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Menu" aria-controls="Menu" aria-expanded="false" aria-label="Toggle navigation">
		  		  <span class="navbar-toggler-icon"></span>
		 	    </button>
		
		 	    <div class="collapse navbar-collapse" id="Menu">
		   		 <ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menuContainer">';
        $counter = 0;
		foreach ($obj as $value) {
            if($counter==$inactiveMenuIndex) {
                $rt .= '<li class="nav-item active inactive">
			        <a class="nav-link" href="#"><span class="inactive">' . $value["name"] . '</span></a>
			      </li>';
            }
            else{
                $rt .= '<li class="nav-item active">
			        <a class="nav-link" href="' . $value["link"] . '"><span>' . $value["name"] . '</span></a>
			      </li>';
            }
            $counter++;
		}
		$rt.='   </ul>
			  </div>

			</nav>';

		return $rt;
   }
   
   //возврашает контент
   function AssemblyContent(){
   	 return '<div class="row" id=siteContent></div>';
   }
   //принимает текст для копирайтинга и масив картинов с сылками
    //возврашает футер
   function AssemblyFooter($imgObject,$copyright){
   	 $rt='<div class="container row" id="footer"> 
         <div id="copyrite" class="container container col-md-3">'.$copyright.'</div>
             <div id="social" class="container container col-md-8">
             	<div class="container">';
           foreach ($imgObject as  $value) {
              $rt.='<div class="socialButton"><a href="'.$value['link'].'"><img class="socialImg" src="'.$value['image'].'"></a></div>';
           }
         $rt.='</div>
             </div>
		</div>';
		return $rt;
   }

 //собирает сайт
   function FullAsembly($logo,$menuArray,$cpy,$footerArray,$mod){
   	 echo siteHeader($mod);
   	 echo '<body>';

   	 echo setLogo($logo);

   	 echo'<div  id="siteBody" class="container" >';
   	 echo AssemblyMenu($menuArray,0);
   	 echo AssemblyContent();
   	 echo AssemblyFooter($footerArray, $cpy);

   	 echo '	</div>
	</body>
	</html>';
   }
   
?>
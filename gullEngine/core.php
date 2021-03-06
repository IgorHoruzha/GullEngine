<?php
///!!! Набор функций собирающий разные блоки сайта по входным параметрам !!!
   //возвращает хедер !
   //принимает 0 для обычного режима и 1 для админ мода
	function siteHeader($mode){
      
      $bousIncludes='';
      $modeText='';
	  
      if($mode=='0'){
        $modeText=''; 
      }
	  
      else{
        $modeText='../';
        $bousIncludes.='<link href="../css/adminEditor.css" rel="stylesheet">';
      }
       return '
                    <!DOCTYPE html>
                      <html lang="en">
                      <head>

                          <meta charset="UTF-8">
                          <title>gullPreviev</title>
                          <script src="'.$modeText.'js/GullEngine.js"></script>
                          <link href="'.$modeText.'css/style.css" rel="stylesheet">

                          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                          <link rel="icon" type="image/png" href="'.$modeText.'image/favicon.png" />
                          <link href="'.$modeText.'css/bootstrap.min.css" rel="stylesheet">
                         

                          <script type="text/javascript" src="'.$modeText.'js/jquery-3.3.1.min.js"></script>
                          <script src="'.$modeText.'js/bootstrap.min.js"></script>
                          '.$bousIncludes.'
                      </head>';
	}

	//возврашает логотип сайта
    function setLogo($logoSrc,$mode){
	    if($mode=='1'){
            $rt='<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#logoEditModale"  data-whatever="@mdo" id="editLogo">Edit</button>';
        }
    	$rt.='<img src="'.$logoSrc.'" id="logo"/>';
	    return $rt;
    }

   // принимает асициативный масив с именами пунктов меню и их ссылками.
   //возвращает собранное нав-бар меню.
   function AssemblyMenu($obj,$inactiveMenuIndex,$type){
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
                //TODO: HERE  WILLBE  <a class="nav-link" href="' . $value["link"] . '"><span>' . $value["name"] . '</span></a>
                $rt .= '<li class="nav-item active usageButton">

			       <a class="nav-link" href="#"><span>' . $value["name"] . '</span></a>
			      </li>';
            }
            $counter++;
		}
        if($type=='1'){
		     $rt.='<li class="nav-item">
                
                <img data-toggle="modal" data-target="#addMenuButon"  data-whatever="@mdo" class="socialImg" src="../image/adminEditor/addPlus.png" id="addMenu">
              </li>';
        }
		$rt.='   </ul>
			  </div>

			</nav>';

		return $rt;
   }
   
   //возврашает контент
   function AssemblyContent($content){
   	 return "<div class=\"row align-items-center justify-content-center\" id=siteContent>{$content}</div>";
   }
   //принимает текст для копирайтинга и масив картинов с сылками
    //возврашает футер
   function AssemblyFooter($imgObject,$copyright,$type){
   	 $rt='<div class="container row" id="footer"> 
         <div id="copyrite" class="container container col-md-3">';
         if($type=="1"){
           $rt.='<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#copyrightModale"  data-whatever="@mdo" id="editCopyrite">Edit</button>';
         }
         $rt.=''.$copyright.'</div>
             <div id="social" class="container container col-md-8">
             	<div class="container">';
           foreach ($imgObject as  $value) {
              $rt.='<div class="socialButton"><a href="'.$value['link'].'"><img class="socialImg" src="'.$value['image'].'"></a></div>';
           }
            if($type=='1'){
              $rt.='<div class="socialButton"><img class="socialImg" data-toggle="modal" data-target="#addSocialButton"  data-whatever="@mdo" src="../image/adminEditor/addPlus.png" id="addSocial"></div>';
            }

         $rt.='</div>
             </div>
		</div>';
		return $rt;
   }
   function generateModal(){
             return '<div class="modal"  id="copyrightModale"  tabindex="0" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Enter copyright</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="text" class="form-control" placeholder="You copyright" id="copyrightInput">
                      </div>
                      <div class="modal-footer">
                          <button id ="changeCopyright" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
            </div>
          </div>

          <div class="modal"  id="logoEditModale"  tabindex="1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Select logo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="file" class="form-control" name="attachment" id="logoImage">
                      </div>
                      <div class="modal-footer">
                           <button id ="changeLogo" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
            </div>
          </div>

           <div class="modal"  id="backgroundEditModal"  tabindex="1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Select Background</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="file" class="form-control" name="attachment" id="backgroundImage">
                      </div>
                      <div class="modal-footer">
                           <button id ="changeBackground" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
            </div>
          </div>

          <div class="modal"  id="addSocialButton"  tabindex="2" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Enter social button options</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                           

                           <input type="file" name="file" class="form-control" multiple="true" 
                             accept="image/jpeg,image/gif,image/x-png" id="socialImage" value="Обзор"/>

                           <input type="text" class="form-control" placeholder="Social Link" id="socialLinkInput">
                      </div>
                      <div class="modal-footer">
                          <button id ="appendSocial" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
            </div>
          </div>


          <div class="modal"  id="addMenuButon"  tabindex="3" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Enter menu options</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="text" class="form-control" placeholder="Menu Name" id="menuNameInput">
                          <textarea type="text" class="form-control" placeholder="Menu Content" id="menuLinkInput"></textarea>
                      </div>
                      <div class="modal-footer">
                          <button id ="appendMenuButtons" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
            </div>
          </div>';
   }
   
 //собирает сайт
   function FullAsembly($logo,$menuArray,$cpy,$content,$footerArray,$inactiveMeny,$mod){
   	 echo siteHeader($mod);
   	 echo '<body>';
     
   	 echo setLogo($logo,$mod);

   	 echo'<div  id="siteBody" class="container" >';
     if($mod==1){
     echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#backgroundEditModal"  data-whatever="@mdo" id="editBackground">Change Background</button>';
     }
   	 echo AssemblyMenu($menuArray,$inactiveMeny,$mod);

   	 echo AssemblyContent($content);

   	 echo AssemblyFooter($footerArray,$cpy,$mod);
     if($mod==1){
      echo generateModal();
     }
   	 echo '	</div>

	</body>
	</html>';
   }

   
?>
    
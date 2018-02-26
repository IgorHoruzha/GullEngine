<?php
include 'gullEngine/core.php';
include 'gullEngine/dataControler.php';
if(isset($_POST[reqObj])) {
    echo AssemblyContent(readContent($_POST[reqObj]));
}else
{
    echo '404';
}
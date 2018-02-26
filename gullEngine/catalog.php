<?php
require_once("deff.php");
if (isset($_POST["auth"])) {
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["pwd"] = $_POST["pwd"];
    if (LOGIN == $_SESSION["login"] and PWD == $_SESSION["pwd"]) {
        session_start();
        require_once('core.php');
        require_once('dataControler.php');
        require_once('adminEditor.php');
    }else{
        header("location:"."../admin.php");
    }
}else{
    die("Go to hell!");
}

?>
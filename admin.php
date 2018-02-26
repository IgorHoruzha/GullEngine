<?php
require_once("gullEngine/deff.php");
    if(!defined(DEFFS)) {
        die("Go to hell!");
    }
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/auth.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
    <div class="container">
        <form class="form-signin" action="gullEngine/catalog.php" method="post">
            <h1 class="form-signin-heading text-muted">Авторизация</h1>
            <input type="text" class="form-control" placeholder="Логин" required="" autofocus="" name="login">
            <input type="password" class="form-control" placeholder="Пароль" required="" name="pwd">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="auth">
                Войти
            </button>
        </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

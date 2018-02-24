<?php
    include 'gullEngine/core.php';

    $mysqli = new mysqli("localhost", "root", "", "GullEnginBase");

    /* проверка соединения */
    if ($mysqli->connect_errno) {
        printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
        exit();
    }

    /* Создание таблицы не возвращает результирующего набора */

    //пункты менюшки
    $menuArray = [];
    /* Select запросы возвращают результирующий набор */
    if ($result = $mysqli->query("SELECT Name, LINK FROM menuItems")) {
        foreach ($result->fetch_all() as $row) {
            $menuArray[$i++] = array("name" => $row[0], "link" => $row[1]);
        }
        $result->close();
    }
    //лого
    $logo = 'image/logo.png';
    // картинки с соцсетями в футере
    $footArray[0] = array("link" => "https://vk.com", "image" => "image/socialImages/vk.png");
    $footArray[1] = array("link" => "https://www.facebook.com", "image" => "image/socialImages/facebook.png");
    $footArray[2] = array("link" => "https://twitter.com", "image" => "image/socialImages/twiter.png");
    //текст для копирайтинга
    $cpy = "Copyright © 2017";



    //Content info
    $queryText = <<<QUERY
SELECT HTMLCONTENT FROM GullContent WHERE MENU_ID =( SELECT ID FROM MenuItems WHERE '{$_GET['id']}' = NAME )
QUERY;

    if ($result = $mysqli->query($queryText)) {
        $result = $mysqli->query($queryText);
        $content = $result->fetch_all()[0][0];
    }
    else{
        //TODO: If content not found;
    }

    //поехали!
    FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 0);

?>
<?php
//TODO: Maybe host user and password add as parameters;
function DateBaseQuery($query)
{
    $link = mysqli_connect('localhost', 'root', '', 'GullDataBase')
    or die("Ошибка " . mysqli_error($link));
    $queryResult = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);
    return $queryResult;
}

function SelectModIfNeed($text, $mod)
{
    //TODO:NEED CHECK IF MOD ALREADY SELECTED
    if ($mod) {
        return  $text='../'.$text;
    }
}

//добавить кнопку меню в базу данных
function addmenuButton($id, $name, $link)
{
    $result = DateBaseQuery("INSERT INTO MenuButtons VALUES('{$id}','{$name}','{$link}')");
    if ($result) {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
}

//возврашает масив кнопок меню из базы
function readMenuButton()
{
    $result = DateBaseQuery("SELECT NAME FROM MenuButtons");
    if ($result) {
        $footArray = [];
        $counts = mysqli_num_rows($result);
        for ($i = 0, $colum = 0; $i < $counts; $i++, $colum++) {
            //TODO: MAYBE TOGLE MOD HERE    if ($mod == 0) {      $modStr = '';    } else {    $modStr = '../';            }
            $footArray[$i]['name'] = mysqli_fetch_row($result)[0];
        }
        return $footArray;
    }
}

//добавляет контент в базу данных
function addContent($shId, $menuСhain, $content)
{
    $result = DateBaseQuery("INSERT INTO content VALUES('{$shId}','{$menuСhain}','{$content}')");
    if ($result) {
        echo "<span style='color:blue;'>Данные {$result}добавлены</span>";
    }
}

//возврашает контент из базы данных по индексу
function readContent($indx)
{
    //TODO: NEED Checking Checking here
    return DateBaseQuery("SELECT LINING FROM Content WHERE MENU_ID={$indx}")->fetch_all()[0][0];
}

//добавить в футер буттон
function addToFooter($img, $link)
{
    $result = DateBaseQuery("INSERT INTO FooterButons VALUES('{$img}','{$link}')");
    if ($result) {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
}

//чтение футера из базы данных
function readFooter($mod)
{
    $result = DateBaseQuery("SELECT * FROM FooterButons");//TODO: * IS SO BAD VARIANT TO SELECT
    if ($result) {
        $footArray = [];
        $counts = mysqli_num_rows($result);
        for ($i = 0, $colum = 0; $i < $counts; $i++, $colum++) {
            $resultRow = mysqli_fetch_row($result);
            $footArray[$i]['image'] = SelectModIfNeed($resultRow[0],$mod);
            $footArray[$i]['link'] = $resultRow[1];
        }
        return $footArray;
    }
}

function WriteInFile($fileName, $content)
{
    // открываем файл, если файл не существует,
    //делается попытка создать его
    $fp = fopen($fileName, "w");
    fwrite($fp, $content); // записываем в файл текст
    fclose($fp);  // закрываем
}

//перезаписывает путь к логотипу
function addLogo($content)
{
    WriteInFile("Design.txt", $content);
}

//возврашает путь к логотипу
function readLogo($mod)
{
    $fileAdress= SelectModIfNeed('Design.txt',$mod);
    $current = file_get_contents($fileAdress);   // Открываем файл для получения существующего содержимого
    return SelectModIfNeed($current,$mod);
}

//перезаписать текст копирайтинга
function setCopyr($cpy)
{
    WriteInFile("Cpyriting.txt", $cpy);
}

//возврашает текст копирайтинга
function readCopyr($mod)
{
    $fileAdress= SelectModIfNeed('Cpyriting.txt',$mod);
    $current = file_get_contents($fileAdress);
    return $current;
}
?>
  
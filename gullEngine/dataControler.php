<?php
//!!! Набо функций чтения и записи в базу данных
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
	else{
		return  $text;
	}
}

//добавить кнопку меню в базу данных
function addmenuButton($id, $name, $link,$priority)
{
    DateBaseQuery("INSERT INTO MenuButtons VALUES('{$id}','{$name}','{$link}','{$priority}')");
}

//возврашает масив кнопок меню из базы
function readMenuButton()
{
    $result = DateBaseQuery("SELECT NAME FROM MenuButtons ORDER BY priority ASC ");
    if ($result) {
        $footArray = [];
        $counts = mysqli_num_rows($result);
        for ($i = 0, $colum = 0; $i < $counts; $i++, $colum++) {
            $footArray[$i]['name'] = mysqli_fetch_row($result)[0];
        }
        return $footArray;
    }
}

//добавляет контент в базу данных
function addContent($shId, $menuСhain, $content)
{
    DateBaseQuery("INSERT INTO content VALUES('{$shId}','{$menuСhain}','{$content}')");
}

//возврашает контент из базы данных по индексу
function readContent($indx)
{
    //TODO: NEED Checking Checking here
    return DateBaseQuery("SELECT LINING FROM Content WHERE MENU_ID={$indx}")->fetch_all()[0][0];
}

//добавить в футер буттон
function addToFooter($img,$link)
{
    DateBaseQuery("INSERT INTO FooterButons VALUES('{$img}','{$link}')");
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
  
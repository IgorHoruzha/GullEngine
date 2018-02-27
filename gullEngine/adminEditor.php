<?php

session_start();
//лого
$logo = readLogo(1);
//пункты менюшки
$menuArray = readMenuButton();
//контент
$content = readContent(0);
//текст для копирайтинга
$cpy = readCopyr(1);
//футер
$footArray = readFooter(1);
//поехали!
FullAsembly($logo, $menuArray, $cpy, $content, $footArray, 0, 1);
?>

<script>

    function menuEvent() {
        $('.nav-link').click(function (e) {

            var currentMenuButton = $(e.currentTarget);

            function getServerAnswer(x) {
                $($('.navbar')[0]).replaceWith(x.menu);
                $('#siteContent').replaceWith(x.content);
                menuEvent();
            }

            //TODO: HEARE INCORRECT INDEX SEARCH.
            var cNumber = 0;
            for (var i = 0; i < $('.nav-link').length; i++) {
                if (e.target.innerText == $('.nav-link')[i].text) {
                    cNumber = i;
                }
            }

            var obj = new function () {
                this.menuButton = currentMenuButton.children().text();
                this.number = cNumber;
                this.type = 1;
            }
            var jr = JSON.stringify(obj);
            var strReqest = {"reqObj": jr};
            $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "JSON");

        });
    }

    menuEvent();

    function reqestObject() {
        this.type;
        this.value;
    }

    $('#appendSocial').click(function (e) {
        var sLink = $('#socialLinkInput').val();
        var imgPath = $('#socialLinkInput').val();
    });

    $('#logoImage').on('change', function () {
        files = this.files;
    });
    $('#changeLogo').click(function (event) {
        if (typeof files == 'undefined') return;    // ничего не делаем если files пустой
        var data = new FormData();                   // создадим объект данных формы

        // заполняем объект данных файлами в подходящем для отправки формате
        $.each(files, function (key, value) {
            data.append(key, value);
        });

        // добавим переменную для идентификации запроса
        data.append('my_file_upload', 1);

        // AJAX запрос
        $.ajax({
            url: '../tmpPhpServer.php',
            type: 'POST', // важно!
            data: data,
            cache: false,
            dataType: 'json',
            // отключаем обработку передаваемых данных, пусть передаются как есть
            processData: false,
            // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
            contentType: false,
            // функция успешного ответа сервера
            success: function (respond, status, jqXHR) {

                // ОК - файлы загружены
                if (typeof respond.error === 'undefined') {
                    // выведем пути загруженных файлов в блок '.ajax-reply'
                    var files_path = respond.files;
                    var html = '';
                    $.each(files_path, function (key, val) {
                        html += val + '<br>';
                    })

                    $('.ajax-reply').html(html);
                }
                // ошибка
                else {
                    console.log('ОШИБКА: ' + respond.error);
                }
            },
            // функция ошибки ответа сервера
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }

        });
    });

    //работает
    $('#changeCopyright').click(function (e) {
        var cpyText = $('#copyrightInput').val();
        var editOb = new reqestObject();
        editOb.type = 'copyright';
        editOb.value = cpyText;
        var jsonEdit = JSON.stringify(editOb);
        var strReqest = {"objectToAdd": jsonEdit};

        function getServerAnswer(x) {
            $('#copyrite').html('<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#copyrightModale"  data-whatever="@mdo" id="editCopyrite">Edit</button>' + x);
        }

        $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "HTML");
    });

    //работает
    $('#appendMenuButtons').click(function (e) {
        var mName = $('#menuNameInput').val();
        var mContent = $('#menuLinkInput').val();
        var editOb = new reqestObject();

        editOb.type = 'munuButton';
        editOb.name = mName;
        editOb.content = mContent;
        var jsonEdit = JSON.stringify(editOb);
        var strReqest = {"objectToAdd": jsonEdit};

        function getServerAnswer(x) {
            console.log(x);
        }
        $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "HTML");
    });
</script>

<script type="text/javascript">


</script>
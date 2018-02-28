    

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    СКРИПТЫ ОТПРАЛЯЮШИЕ ЗАПРОСЫ НА tmpPhpServer.php котоырй редактироует базуданных сайта    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    function reqestObject() {
        this.type;
        this.value;
    }

    $('#appendSocial').click(function (e) {
        var sLink = $('#socialLinkInput').val();
        var imgPath = $('#socialLinkInput').val();
    });

    //работает
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
        data.append('changeLogoFile', 1);

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
                       console.dir(respond);
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
    $('#socialImage').on('change', function () {
        files = this.files;
    });
    //работает
    $('#appendSocial').click(function (event) {
        if (typeof files == 'undefined') return;   // ничего не делаем если files пустой
        var data = new FormData();                   // создадим объект данных формы

        // заполняем объект данных файлами в подходящем для отправки формате
        $.each(files, function (key, value) {
            data.append(key, value);
        });

        // добавим переменную для идентификации запроса
        data.append('addSocialFile', 1);
        var socLink = $('#socialLinkInput').val();
        data.append('socialImageLink',socLink);
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
                    $('#footer').replaceWith(respond.files); 
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
     
            $($('.navbar')[0]).replaceWith(x.menu);
            $('#siteContent').replaceWith(x.content);
            menuEvent(1);
        }
        $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "JSON");
    });

    //работает
    $('#backgroundImage').on('change', function () {
        files = this.files;
    });
    $('#changeBackground').click(function (event) {
        if (typeof files == 'undefined') return;    
        var data = new FormData();                         
        $.each(files, function (key, value) {
            data.append(key, value);
        });

        data.append('changeBackgroundFile', 1);

        $.ajax({
            url: '../tmpPhpServer.php',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,

            success: function (respond, status, jqXHR) {
                
                // ОК - файлы загружены
                if (typeof respond.error === 'undefined') {            
                       console.dir(respond.files);
                       window.location.reload();
                }
                // ошибка
                else {
                    console.log('ОШИБКА: ' + respond.error);
                }
            },   
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }
        });
    });
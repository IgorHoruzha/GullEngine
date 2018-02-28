 
//обработчик событий менюхи
 function menuEvent(mod) {
        $('.usageButton').click(function (e) {

            var currentMenuButton = $(e.currentTarget);

            function getServerAnswer(x) {
               
                $($('.navbar')[0]).replaceWith(x.menu);
                $('#siteContent').replaceWith(x.content);
                menuEvent(mod);
            }
            var cNumber = 0;
            for (var i = 0; i < $('.nav-link').length; i++) {
                if (e.target.innerText == $('.nav-link')[i].text) {
                    cNumber = i;
                }
            }

            var obj = new function () {
                this.menuButton = currentMenuButton.children().text();
                this.number = cNumber;
                this.type = mod;
            }

            var jr = JSON.stringify(obj);
            var strReqest = {"reqObj": jr};
            if(mod==0){
               $.post("tmpPhpServer.php", strReqest, getServerAnswer, "JSON"); 
            }
            else{
                $.post("../tmpPhpServer.php", strReqest, getServerAnswer, "JSON"); 
            }
        });
}
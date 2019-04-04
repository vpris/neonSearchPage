<?php
require('database/globalVariables.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routing Search</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        $(function() {
            $("#autocomplete_input").autocomplete({
                source: "autocomplete.php",
            }
            
            );
        });
    </script>
</head>
<body>
    <div class="wrapper indexPage">
        <div class="themeName">
            Тема: Сияние-1980<br>
            Routing Search: <?= $versionR ?><br>
            Разработчик: <a href="http://confluence.raiffeisen.ru/">Владимир Присяжников</a>
        </div>
        <div class="mainSection">
            <div class="searchContainer">
                <div class="logoContainer">
                    <p id="routing">R<span>o</span>uti<span>n</span></p><p id="routingG">g</p>
                </div>
                <form action="search_matching_modes.php" method="get">
                    <div class="searchBarCont">
                        <input class="searchBox" id="autocomplete_input" autocomplete="off" placeholder="Приложение, отв.группа, слово из текста. Скоро и сервер..." type="search" name="q">
                        <button class="searchButton" type="submit"><img src="assets/icons/search.png"> </button>
                    </div>
                    <div class="searchBarTextCont"><p>Легко начать. Введите запрос, например: <span class="searchBarWord"><a href="<?= $searchLinkWord.$randSearchWord ?>"><?= $randSearchWord ?></a></span></p></div>
                </form>
            </div>
	
        </div>
    </div>
</body>
</html>
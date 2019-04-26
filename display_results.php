
<?php




if(isset($_GET["q"])) {
	$printTerm = $_GET["q"];
}
else {
    exit("Нужно вернуться к поиску");
}
$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;


require('database/conf.php');
require('database/queryes.php');
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Routing Search</title>
    <script src="assets/js/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#autocomplete_input").autocomplete({
                source: "autocomplete.php",
                minLength: 1,
                maxLength: 20
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
	<!-- <script type="text/javascript" src="assets/js/script.js"></script> -->
</head>
<body>
<div class="wrapper">
        <div class="header">
            <div class="headerContent">
                <div class="logoContainer">
                    <a href="index.php">
                        <H2>ROUTING</H2>
                    </a>
                </div>
                <div class="searchContainer">
                    <form action="search_matching_modes.php" method="GET">
                        <div class="searchBarContainer">
                            <input type="hidden" name="type" value="<?php echo $type; ?>">
                            <input class="searchBox" id="autocomplete_input" type="search" name="q" value="<?php echo $printTerm; ?>" autocomplete="off" autofocus>
                            <button class="searchPageButton" type="submit"></button>
                        </div>
                    </form>
                </div>
                <div class="modalSearchHelp">
                <!-- Button trigger modal -->
                <button type="button" class="toolTip" data-toggle="modal" data-target="#exampleModal">
                    <img src="assets/icons/info.png">
                        Подсказка по поиску
                    <img src="assets/icons/info.png">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Краткая справка по операторам поиска</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="operatorsDefault">
                            По-умолчанию работает оператор <kbd>AND</kbd>.<br> Если вы ищите, <kbd> ABS поддержка </kbd>, то система ищет слово <kbd>ABS</kbd>, в одной записи с которым находится слово <kbd>Поддержка</kbd>. Это уменьшает круг вашего поиска.
                        </div>
                        <hr>
                        Для более точной фильтрации существуют следующие операторы:
                        <hr>
                        <span class="operators">Оператор OR (или):</span> Обозначается вертикальной чертой <kbd>|</kbd>.
                        Например: <kbd>Siebel | ABS</kbd>. Означает: "найти совпадения по Siebel или ABS".
                        <hr>
                        <span class="operators">Оператор NOT (не):</span> Обозначается <kbd>!</kbd> или <kbd>-</kbd>. 
                        Например: <kbd>Siebel !corporate</kbd> или <kbd>Siebel -corporate</kbd>. Что значит: "найти Siebel, который не содержит corporate"
                        <hr>
                        <span class="operators">Группировка:</span>В Routing Search есть возможность группировать запросы. Осуществляется внесением запросов в скобки <kbd>( Siebel )</kbd>. 
                            Пример использования: <kbd>(Siebel !corporate) | (ABS-4 !выписки)</kbd> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="tabsContainer">
                <ul class="tabList">
                    <li class="<?php echo $type == 'sites' ? 'active' : '' ?>" title='Поиск по роутингу'>
                        <a href='<?php echo "search_matching_modes.php?q=$printTerm&type=sites"; ?>'>
                            Страницы
                        </a>
                    </li>
                    <li class="<?php echo $type == 'ucmdb' ? 'active' : '' ?>" title='Поиск по ucmdb'>
                        <a href='<?php echo "display_ucmdb_results.php?q=$printTerm&type=ucmdb"; ?>'>
                            uCMDB
                        </a>
                    </li>
                    <li class="<?php echo $type == 'images' ? 'active' : '' ?>" title='Поиск по изображениям роутинга'>
                        <a href='<?php echo "search_matching_modes.php?q=$printTerm&type=images"; ?>'>
                            Изображения
                        </a>
                    </li>
                </ul>
            </div>
        </div>

         
                <?php

                if($type == "sites") {
                    require('database/shortResults.php');

                }
                elseif($type == "ucmdb") {
                    require('database/shortResultsUcmdb.php');
                }
                else {
                    require('database/shortResultsImages.php');
                }


                ?>
<!--    <div class="rightPages" >
            <button data-frame-load='test'>Загрузить</button>
            <iframe data-frame-group="test" data-frame-src="//calypso-goods.ru" width="730" height="800" frameborder="0"></iframe>
        </div>
            <script>
                    [...document.querySelectorAll('[data-frame-load]')].forEach(button => {
                button.addEventListener('click', () => {
                    const group = button.getAttribute('data-frame-load');
                    [...document.querySelectorAll(`[data-frame-group="${group}"]`)].forEach(frame => {
                        frame.setAttribute('src', frame.getAttribute('data-frame-src'));
                    });
                });
            });
        </script>  скрипт для клика на кнопку и открытия iframes -->
</body>
</html>

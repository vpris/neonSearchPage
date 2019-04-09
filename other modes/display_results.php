<?php

include("database/conf.php");
include("classes/SiteResultProvider.php");


if(isset($_GET["q"])) {
	$printTerm = $_GET["q"];
}
else {
    exit("Нужно вернуться к поиску");
}
$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Search</title>
    <script src="assets/js/jquery-1.12.4.js"></script>
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

</head>
<body>
    <div class="wrapper searchPage">
        <div class="header">
            <div class="searchPageHead">
                <a class="logoLink" href="index.php">
                    <div class="logoContainerSearch">
                        <p id="routingSearch">R<span>o</span>uti<span>n</span></p><p id="routingGsearch">g</p>
                    </div>
                </a>
                <div class="searchPageContainer">
                    <form action="display_results.php" method="GET">
                        <div class="searchBarCont">
                            <input type="hidden" name="type" value="<?php echo $type; ?>">
                            <input class="searchBox" id="autocomplete_input" autocomplete="off" type="search" value="<?php echo $printTerm; ?>" name="q">
                            <button class="searchButton" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="tabsContainer">
                        <ul class="tabList">
                            <li class="<?php echo $type == 'sites' ? 'active' : '' ?>">
                                <a href='<?php echo "display_results.php?q=$printTerm&type=sites"; ?>'>
                                    Sites
                                </a>
                            </li>

                            <li class="<?php echo $type == 'images' ? 'active' : '' ?>">
                                <a href='<?php echo "display_results.php?q=$printTerm&type=images"; ?>'>
                                    Images
                                </a>
                            </li>
                        </ul>
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             class="modalSearchHelp">
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
                            <span class="operators">Оператор * *:</span> Обозначается двумя звёздочками, между которыми помещается искомый кусок слова. <kbd>* *</kbd>. 
                            Например: <kbd>*пр*</kbd>. Будут найдены: проспект, привет, апроксимация и др.
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
    </div>
    <div class="mainResultsSection">
        <?php
            include("classes/SiteResultProvider.php");
        ?>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

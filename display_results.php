<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper searchPage">
        <div class="searchPage">
        <div class="logoContainerSearch">
            <p id="routingSearch">R<span>o</span>uti<span>n</span></p><p id="routingGsearch">g</p>
        </div>
            <div class="searchPageContainer">
                <form action="search_matching_modes.php" method="GET">
                    <div class="searchBarCont">
                        <input class="searchBox" id="autocomplete_input" value="<?php echo $_GET['q'] ?>" autocomplete="off" type="search" name="q">
                        <button class="searchButton" type="submit"><img src="assets/icons/search.png"> </button>
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
        <?php
        require('database/conf.php');
        require('database/queryes.php');
        require('database/shortResults.php');
        ?>
    </div>
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

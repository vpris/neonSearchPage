<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
     
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
                        <input class="searchButton" type="submit" value="Search">
                    </div>
                </form>
            </div>
            <div class="modalSearchHelp">
                <!-- Button trigger modal -->
                <button type="button" class="toolTip btn btn-info" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-info"></i>
                        Подсказка по поиску
                    <i class="fas fa-info"></i>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

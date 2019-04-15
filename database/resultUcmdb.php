<?php

// Переменные, чтобы меньше текста писать и сохранить красивый html-код.
$clicks = "{$post['clicks']}";
$url = "{$post['url']}";
$title = "{$post['title']}";
$AdOrOther = "{$post['AdOrOther']}";
$autorizationMeth = "{$post['autorizationMeth']}";
$groupsApp = "{$post['groupsApp']}";
$keywords = "{$post['keywords']}";
$content = "{$post['content']}";

// Вывод title, content и любых других полей по желанию
$resultH = "<div class='mainResultsSection'>
                Здесь будут результаты с UCMDB
            </div>";
print $resultH;

?>
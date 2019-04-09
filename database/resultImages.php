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
$resultH = "
<div class='mainResultsSection'>
        <div class='searchResult'>
            <div class='searchResultHead'>
                <div class='title'><a href='$url' data-linkId='$id' >$title</a></div>";
                if ($clicks >= 100) {
                    $resultH .= " <img title='Популярная запись' src='assets/icons/burn.png' alt='Огонек 1' class='resultImage'> ";
                }
$resultH .= "
                 <div class='rightBlocks'>
                    <div class='adOrOther'>$AdOrOther</div>
                    <div class='autorizationMeth'>$autorizationMeth</div>
                    <div class='groupsApp'>$groupsApp</div>
                </div>
            </div>
            <span class='postContent'>Теги: $keywords</span><br>
            <span class='content'>$content</span>
        </div>
</div>
";
print $resultH;

?>
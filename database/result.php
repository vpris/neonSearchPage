<?php
$clicks = "{$post['clicks']}";
$url = "{$post['url']}";
$title = "{$post['title']}";
$AdOrOther = "{$post['AdOrOther']}";
// Вывод title, content и любых других полей по желанию
        print "
        <div class='searchResult'>
            <div class='searchResultHead'>
                <div class='title'><a href='$url'>$title</a></div>
                 <div class='rightBlocks'>
                    <div class='adOrOther'>$AdOrOther</div>
                    <div class='autorizationMeth'>{$post['autorizationMeth']}</div>
                    <div class='groupsApp'>{$post['groupsApp']}</div>
                </div>
            </div>
            <span class='postUrl'>{$post['url']}</span> <br>
            <span class='postContent'>Теги: {$post['keywords']}</span><br>
            <span class='postContent'>Клики: $clicks</span><br>
            <span class='content'>{$post['content']}</span>
            </span>
        </div>";

?>
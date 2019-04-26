<?php

// Функция показа результатов в красивом формате
function display_results($results, $message = null)
{
    global $post_stmt, $cat_stmt;
    if ($message) {
        print "<h3>$message</h3>";
    }
    if (!isset($results['matches'])) {
        print "<div class='mainResultsSection'>
                    <div class='notFound'>
                        Результаты не найдены
                    </div>
                </div>
                ";
        return;
    }
    foreach ($results['matches'] as $result) {
        // Получение данных для этого документа (поста) из базы данных
        $post_stmt->bindParam(':id', $result['id'], PDO::PARAM_INT);
        $post_stmt->execute();
        $post = $post_stmt->fetch(PDO::FETCH_ASSOC);
        
        // Переменные, чтобы меньше текста писать и сохранить красивый html-код.
        $clicks           = "{$post['clicks']}";
        $url              = "{$post['url']}";
        $title            = "{$post['title']}";
        $AdOrOther        = "{$post['AdOrOther']}";
        $autorizationMeth = "{$post['autorizationMeth']}";
        $groupsApp        = "{$post['groupsApp']}";
        $keywords         = "{$post['keywords']}";
        $content          = "{$post['content']}";
        
        // Вывод title, content и любых других полей по желанию
        $resultH = "
        <div class='mainResultsSection'>
                <div class='searchResult'>
                    <div class='searchResultHead'>
                        <div class='titleLink'><a class='result' href='$url'>$title</a></div>";
        if ($clicks >= 100) {
            $resultH .= " <img title='Популярная запись' src='assets/icons/burn.png' alt='Огонек 1' class='resultImage'> ";
        }
        $resultH .= "   <div class='rightBlocks'>
                            <div class='adOrOther'>$AdOrOther</div>
                            <div class='autorizationMeth'>$autorizationMeth</div>
                            <div class='groupsApp' title='$groupsApp'>$groupsApp</div>
                        </div>
                    </div>
                    <span class='postContent'>Теги: $keywords</span><br>
                    <span class='content'>$content</span>
                </div>
        </div>
        ";
        print $resultH;
    }
}

?>
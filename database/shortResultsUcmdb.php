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
        $post_stmt->bindParam(':id',
            $result['id'],
            PDO::PARAM_INT);
        $post_stmt->execute();
        $post = $post_stmt->fetch(PDO::FETCH_ASSOC);

        require('database/resultUcmdb.php');
    }
}

?>
<?php

// Переменные, чтобы меньше текста писать и сохранить красивый html-код.
$clicks = "{$post['clicks']}";
$url = "{$post['url']}";
$title = "{$post['title']}";
$imageLink = "{$post['imageLink']}";
$alt = "{$post['alt']}";


// Вывод title, content и любых других полей по желанию




$count = 0;
    if($title) {
        $displayText = $title;
    }
    else if($alt) {
        $displayText = $alt;
    }
    else {
        $displayText = $imageLink;
    }

        $resultImage = "<div class='imageResults'>";
            
            $resultImage .= "
                            <a href='$imageLink' target='_blank'>
                                <img src='$imageLink' alt='$alt'>
                            </a>
                            ";

        $resultImage .= "</div>";


        if(!empty ($imageLink)) {
            print $resultImage;
        }






/*
<div class='gridItem  image$count'>
<a href='$imageLink' data-fancybox='image' data-caption='$displayText' data-height='600'
    data-siteurl='$url'>
    <script>
    $(document).ready(function() {
        loadImage(\"$imageLink\", \"image$count\");
    });
    </script>

    <span class='details'>$displayText</span>
</a>

</div>
*/


?>


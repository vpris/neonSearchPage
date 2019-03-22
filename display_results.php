<?php

// Database connection credentials
$dsn ='mysql:dbname=myblog;host=localhost';
$user = 'root';
$pass = 'ekmnhf,er1993';
// Instantiate the PDO (PHP 5 specific) class
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e){
    echo'Connection failed: '.$e->getMessage();
}
// PDO statement to fetch the post data
$query = "SELECT p.*, a.name FROM posts AS p " .
    "LEFT JOIN authors AS a ON p.author_id = a.id " .
    "WHERE p.id = :post_id";
$post_stmt = $dbh->prepare($query);
// PDO statement to fetch the post's categories
$query = "SELECT c.name FROM posts_categories AS pc ".
    "LEFT JOIN categories AS c ON pc.category_id = c.id " .
    "WHERE pc.post_id = :post_id";
$cat_stmt = $dbh->prepare($query);

// Function to display the results in a nice format
function display_results($results, $message = null)
{
    global $post_stmt, $cat_stmt;
    if ($message) {
        print "<h3>$message</h3>";
    }
    if (!isset($results['matches'])) {
        print "No results found<hr />";
        return;
    }
    foreach ($results['matches'] as $result) {
        // Get the data for this document (post) from db
        $post_stmt->bindParam(':post_id',
            $result['id'],
            PDO::PARAM_INT);
        $post_stmt->execute();
        $post = $post_stmt->fetch(PDO::FETCH_ASSOC);

        // Get the categories of this post
        $cat_stmt->bindParam(':post_id',
            $result['id'],
            PDO::PARAM_INT);
        $cat_stmt->execute();
        $categories = $cat_stmt->fetchAll(PDO::FETCH_ASSOC);

        // Output title, author and categories
        print "
        <div class='searchResult'>
            Id: {$post['id']}<br />" .
            "<span class='title'>{$post['title']}</span>" .
            "<span class='author'>Author: {$post['name']}</span> <br />" .
            "<span class='content'>Content: {$post['content']}</span>";
        $cats = array();
        foreach ($categories as $category) {
            $cats[] = $category['name'];
        }
        if (count($cats)) {
            print "<br /><span class='cat'> Categories: " . implode(', ', $cats);
        }
        print "<br />Weight: " . $result['weight'];
        print "       </span> </div> <hr />";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

</body>
</html>

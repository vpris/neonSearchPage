<?php


// PDO statement to fetch the post data
$query = "SELECT * FROM `tasks` WHERE id = :id ORDER BY clicks DESC";

$post_stmt = $dbh->prepare($query);


?>
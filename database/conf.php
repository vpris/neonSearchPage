<?php

// Database connection credentials
$dsn ='mysql:dbname=tests;host=localhost';
$user = 'root';
$pass = 'ekmnhf,er1993';
// Instantiate the PDO (PHP 5 specific) class
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e){
    echo'Connection failed: '.$e->getMessage();
}

?>
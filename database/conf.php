<?php

// Database connection credentials
$user = "root";
$pass = "ekmnhf,er1993";

ob_start();

try {

    $con = new PDO("mysql:dbname=tests; host=localhost", $user, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $con->exec("set names utf8");
    }
    
    
    
    catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
    }


?>
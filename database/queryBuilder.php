<?php

class queryBuilder
{
    public $pdo;
    function __construct()
    {

        $user = "root";
        $pass = "ekmnhf,er1993";
        $this->pdo = new PDO("mysql:dbname=tests; host=localhost", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Список
    function getAllTasks()
    {


    }

}

?>
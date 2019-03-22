<?php
/*
require('api/sphinxapi.php');

$cl = new SphinxClient();

$cl->SetServer('localhost', 3312);

$cl->SetLimits(0, 5);

$cl->SetMaxQueryTime(5000); // Timeout search queries after 5 seconds.

$cl->SetMatchMode(SPH_MATCH_ALL); // Match mode

sql_query = SELECT id, title, summary FROM documents

*/

    // Подключим файл с api
require('vendor/autoload.php');

// Создадим объект - клиент сфинкса и подключимся к нашей службе
$cl = new SphinxClient();
$cl->SetServer( "localhost", 9312 );
$cl->setLimits(0,10);
// Собственно поиск
// Set weighting, weighted field x 50, item name x 10
// Execute the query
$cl->setFieldWeights(array(
    'title' => 10,
    'content' => 1,
));
$q = '"' . $cl->EscapeString($_GET['q']) . '"/1';
$result = $cl->Query($q);


// обработка результатов запроса
if ( $result === false ) {
    echo "Query failed: " . $cl->GetLastError() . ".\n"; // выводим ошибку если произошла
}
else {
    if ( $cl->GetLastWarning() ) {
        echo "WARNING: " . $cl->GetLastWarning() . " // выводим предупреждение если оно было
    ";
    }

    if ( ! empty($result["matches"]) ) { // если есть результаты поиска - обрабатываем их
        foreach ( $result["matches"] as $product => $info ) {
            // просто выводим id найденных товаров
        echo $product . '<br>';
        }
    }
}


// 2. Prepare the statement
$pdo = new PDO("mysql:host=localhost; dbname=tests", "root", "ekmnhf,er1993");
// CRUD
//2. Подготовить запрос
$sql = ("SELECT * FROM tasks WHERE id = $product");
$statement = $pdo->prepare($sql); //подготовить
$result = $statement->execute(); //true || false
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php foreach($tasks as $task):?>
    <tr>
        <td><?= $task['id'];?></td>
        <td><?= $task['title'];?></td>
    </tr>
<?php endforeach;?>
</body>
</html>

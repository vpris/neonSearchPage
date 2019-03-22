<?php
require_once 'vendor/autoload.php';

$sphinxClient = new SphinxClient();
$sphinxClient->setServer('localhost', 9312);
/*$sphinxClient->setFieldWeights(array(
    'title' => 10,
    'content' => 1,
));*/
$sphinxClient->SetConnectTimeout(1);
$sphinxClient->SetArrayResult(true);

$q = '"' . $sphinxClient->EscapeString($_GET['q']) . '"/1';
$results = $sphinxClient->query('одна');

var_dump($results);




exit;
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


</body>
</html>


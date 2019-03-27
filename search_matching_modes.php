<?php
// Include the api class
Require('vendor/autoload.php');
// Include the file which contains the function to display results
require_once('display_results.php');
$client = new SphinxClient();
// Set search options
$client->SetServer('localhost', 9312);
$client->SetConnectTimeout(1);
$client->SetArrayResult(true);
// SPH_MATCH_ALL mode will be used by default
// and we need not set it explicitly
$client->SetMatchMode(SPH_MATCH_ANY);
$q = !empty($_GET['q']) ? $_GET['q'] : '';

display_results(
    $client->Query($q));

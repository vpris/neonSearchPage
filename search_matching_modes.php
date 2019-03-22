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
$client->SetMatchMode(SPH_MATCH_ALL);
display_results(
    $client->Query('php'),
    '"php" with SPH_MATCH_ALL');
display_results(
    $client->Query('programming'),
    '"programming" with SPH_MATCH_ALL');
display_results(
    $client->Query('php programming'),
    '"php programming" with SPH_MATCH_ALL');
// Set the mode to SPH_MATCH_ANY
$client->SetMatchMode(SPH_MATCH_ANY);
display_results(
    $client->Query('php programming'),
    '"php programming" with SPH_MATCH_ANY');
// Set the mode to SPH_MATCH_PHRASE
$client->SetMatchMode(SPH_MATCH_PHRASE);
display_results(
    $client->Query('php programming'),
    '"php programming" with SPH_MATCH_PHRASE');
display_results(
    $client->Query('scripting language'),
    '"scripting language" with SPH_MATCH_PHRASE');
// Set the mode to SPH_MATCH_FULLSCAN
$client->SetMatchMode(SPH_MATCH_FULLSCAN);
display_results(
    $client->Query('php'),
    '"php programming" with SPH_MATCH_FULLSCAN');
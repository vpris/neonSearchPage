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
display_results(
    $client->Query('php programming'),
    '"php programming" (default mode)');
// Set the mode to SPH_MATCH_BOOLEAN
$client->SetMatchMode(SPH_MATCH_BOOLEAN);
// Search using AND operator
display_results(
    $client->Query('php & programming'),
    '"php & programming"');
// Search using OR operator
display_results(
    $client->Query('php | nintendo | framework'),
    '"php | nintendo | framework"');
// Search using NOT operator
display_results(
    $client->Query('php -programming'),
    '"php -programming"');
// Search by grouping terms
display_results(
    $client->Query('(php & programming) | (leadership & success)'),
    '"(php & programming) | (leadership & success)"');
// Demonstrate how OR precedence is higher than AND
display_results(
    $client->Query('development framework | language'),
    '"development framework | language"');
// This won't work
display_results($client->Query('-php'), '"-php"');

<?php
// Include the api class
Require('vendor/autoload.php');
// Include the file which contains the function to display results
Require_once('display_results.php');
$client = new SphinxClient();
// Set search options
$client->SetServer('localhost', 9312);
$client->SetConnectTimeout(1);
$client->SetArrayResult(true);
// Set the mode to SPH_MATCH_EXTENDED2
$client->SetMatchMode(SPH_MATCH_EXTENDED2);
// Returns documents whose title matches "php" and
// content matches "significant"
display_results(
    $client->Query('@title php @content significant'),
    'field search operator');
// Returns documents where "development" comes
// before 8th position in content field
display_results(
    $client->Query('@content[8] development'),
    'field position limit modifier');
// Returns only those documents where both title and content
// matches "php" and "namespaces"
display_results(
    $client->Query('@(title,content) php namespaces'),
    'multi-field search operator');
// Returns documents where any of the field
// matches "games"
display_results(
    $client->Query('@* games'),
    'all-field search operator');
// Returns documents where "development framework"
// phrase matches exactly
display_results(
    $client->Query('"development framework"'),
    'phrase search operator');
// Returns documents where there are three words
// between "people" and "passion"
display_results(
    $client->Query('"people passion"~3'),
    'proximity search operator');
// Returns documents where any of the
// two words from the phrase matches
display_results(
    $client->Query('"people development passion framework"/2'),
    'quorum search operator');

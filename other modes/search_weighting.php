<?php
       // Include the api class
       Require('vendor/autoload.php');
       // Include the file which contains the function to display results
       require_once('display_results.php');
       $client = new SphinxClient();
       $client->SetServer('localhost', 9312);
       $client->SetConnectTimeout(1);
       $client->SetArrayResult(true);
       $client->SetMatchMode(SPH_MATCH_ANY);
       display_results(
       $client->Query('php language framework'),
       'MATCH ANY');
       $client->SetMatchMode(SPH_MATCH_BOOLEAN);
       display_results(
       $client->Query('php | framework'),
       'BOOLEAN');
       $client->SetMatchMode(SPH_MATCH_EXTENDED2);
       display_results(
       $client->Query('@* php | @* framework'),
       'EXTENDED');
<?php
// Include the api class
Require('vendor/autoload.php');
// Include the file which contains the function to display results
Require_once('display_results.php');
$client = new SphinxClient();
$client->SetServer('localhost', 9312);
$client->SetConnectTimeout(1);
$client->SetArrayResult(true);
$client->SetMatchMode(SPH_MATCH_ANY);
// Returns all documents which match "programming games electronics"
       display_results(
       $client->Query('programming games electronics php'),
       'all posts matching "programming games electronics php"');
       // Filter by ID
       $client->SetIDRange(1, 4);
       // Same as above but with ID based filtering
       display_results(
       $client->Query('programming games electronics'),
       'above query with ID based filtering');
       // Reset the ID based filter
       $client->SetIDRange(0, 0);
       // Filter the posts by author's Aditya Mooley and Dr.Tarique Sani
       $client->SetFilter('author_id', array(2, 4));
        display_results(
            $client->Query('programming games electronics'),
            'posts filtered by author');
        // Filter the posts by category Games
        $client->SetFilter('category_id', array(2));
        display_results(
            $client->Query('programming games electronics'),
            'posts filtered by categories');
        // Filter the posts by publish_date using range filter
        $client->SetFilterRange(
            'publish_date',
            strtotime('2010-01-01'),
            strtotime('2010-01-30'));
        display_results(
            $client->Query('programming games electronics'),
            'posts filtered publish date range');
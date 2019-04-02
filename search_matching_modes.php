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

$client->SetMatchMode(SPH_MATCH_BOOLEAN);



(isset($_GET['page']) && int_check($_GET['page']) && $_GET['page'] > 0) ? $page = $_GET['page'] - 1 : $page = 0;
$client->SetLimits($page, 35);
$q = !empty($_GET['q']) ? $_GET['q'] : '';
display_results(
    
$result = $client->Query($q)); 


if ( !$result )
{
// handle errors
print "ERROR: " . $client->GetLastError(); } else
{
// query OK, pretty-print the result set
// begin with general statistics
$got = count ( $result["matches"] );
print "<div class='resultCount'>Найдено результатов $result[total_found].\n"; print "Показаны совпадения с 1 по $got из $result[total].\n</div>";
// print out matches themselves now
$n = 1;

}


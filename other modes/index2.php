<?php
Require('vendor/autoload.php');
// PHP SphinxAPI specific, return matches as a plain array // (as opposed to an array indexed with document IDs) $client->SetArrayResult ( true );
$client = new SphinxClient();
// do query
$result = $client->Query ( "siebel" );
if ( !$result )
{
// handle errors
print "ERROR: " . $client->GetLastError(); } else
{
// query OK, pretty-print the result set
// begin with general statistics
$got = count ( $result["matches"] );
print "Найдено результатов $result[total_found].\n"; print "Показаны совпадения с 1 по $got из $result[total].\n" . '<br>';
// print out matches themselves now
$n = 1;
foreach ( $result["matches"] as $match ) {
// print number, document ID, and weight
print "$n. id=$match[id], weight=$match[weight], "; $n++;
// print group_id attribute value
print "group_id=$match[attrs][group_id]\n" . '<br>'; }
}

?>
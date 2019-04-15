<?php 

class SiteResultProvider
{

    private $con;
    //Подключаем переменную, которая коннектится к mysql
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function connectToSphinx($client) {
        // Include the api class
        Require('vendor/autoload.php');
        // Include the file which contains the function to display results
        Require('display_results.php');
        $client = new SphinxClient();
        // Set search options
        $client->SetServer('localhost', 9312);
        $client->SetConnectTimeout(1);
        $client->SetArrayResult(true);
        // SPH_MATCH_ALL mode will be used by default
        // and we need not set it explicitly
        $client->SetMatchMode(SPH_MATCH_BOOLEAN);
    }
    
    public function connectQueryToSPhinx($q, $client) {
        (isset($_GET['page']) && int_check($_GET['page']) && $_GET['page'] > 0) ? $page = $_GET['page'] - 1 : $page = 0;
        $client->SetLimits($page, 35);
        $q = !empty($_GET['q']) ? $_GET['q'] : '';
    }

    public function errorsAndCounts($result, $client) {
        if ( !$result )
            {
            // handle errors
            print "<div class='errorLast'>ERROR: " . $client->GetLastError() . "</div>"; } else
            {
            // query OK, pretty-print the result set
            // begin with general statistics
            $got = count ( $result["matches"] );
            print "<div class='resultCount'>Найдено результатов: $result[total_found].\n"; print "Показаны совпадения: с 1 по $got из $result[total].\n</div>";
            // print out matches themselves now
            $n = 1;
            }
            print '</div>';
    
    }
    

}









?>

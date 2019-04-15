<?php

Require('display_ucmdb_results.php');


/* function stats(){

    $user_id = $_GET['uid'];

    $sql = "SELECT * FROM users WHERE uid = $user_id ";
    $result = query($sql);

    $row = mysqli_fetch_object($result);
    $username = $row->username;

    $url = ('"http://www.website.com/api/v1/users/'.$username);
    $rCURL = curl_init();

    curl_setopt($rCURL, CURLOPT_URL, $url);
    curl_setopt($rCURL, CURLOPT_HEADER, 0);
    curl_setopt($rCURL, CURLOPT_RETURNTRANSFER, 1);

    $aData = curl_exec($rCURL);

    curl_close($rCURL);

    $response = json_decode($aData, true);    

} */





?>
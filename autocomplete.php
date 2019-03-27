<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'ekmnhf,er1993';
$dbName     = 'myblog';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['q'];
$term = "%".$searchTerm."%";
// Get matched data from tables
$query = $db->query("SELECT * FROM posts WHERE title LIKE '$term'
                            ORDER BY title ASC
                            ");

// Generate skills data array
$completeData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['title'];
        $data['content'] = $row['content'];
        array_push($completeData, $data);
    }
}

// Return results as json encoded array
echo json_encode($completeData);

?>

<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'ekmnhf,er1993';
$dbName     = 'tests';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];
$term = "%".$searchTerm."%";
// Get matched data from skills tables
$query = $db->query("SELECT * FROM tasks WHERE title LIKE '$term'
                            OR keywords LIKE '$term'
                            OR content LIKE '$term'
                            OR groupsApp LIKE '$term'
                            ORDER BY title ASC
                            ");

// Generate skills data array
$completeData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['title'];
        $data['keywords'] = $row['keywords'];
        $data['content'] = $row['content'];
        $data['groupsApp'] = $row['groupsApp'];
        array_push($completeData, $data);
    }
}

// Return results as json encoded array
echo json_encode($completeData);

?>

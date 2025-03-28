<?php 

include 'connectDB.php';
include 'consumptions.php';

$mon = $tue = $wed = $thu = $fri = 0;
$daySQL = 5; // Default for Friday

// Determine the numeric value for the current day
switch(date("D")){
    case "Mon": $daySQL = 1; break;
    case "Tue": $daySQL = 2; break;
    case "Wed": $daySQL = 3; break;
    case "Thu": $daySQL = 4; break;
    case "Fri": $daySQL = 5; break;
    default: $daySQL = 5; break; // Defaults to Friday for weekends
}

// Fetch data from the database
$count = 0;
$sql = "SELECT * FROM `weekly` WHERE `day` BETWEEN 1 AND $daySQL ORDER BY `timestamp` DESC LIMIT $daySQL";
$results = $conn->query($sql);

$line = array_fill(0, 5, 0); // Ensure array is initialized with 0s

if ($results->num_rows > 0){
    while($rows = $results->fetch_assoc()){
        $line[$count] = $rows['value'];
        $count++;
    }
}

// Assign values to variables
$mon = $line[0];
$tue = $line[1];
$wed = $line[2];
$thu = $line[3];
$fri = $line[4];


$_REQUEST['day'] = array(
        'mon' => bill($mon),
        'tues' => bill($tue),
        'wed' => bill($wed),
        'thurs' =>  bill($thu),
        'fri' => bill($fri)
);

echo json_encode($_REQUEST['day']);


?>      
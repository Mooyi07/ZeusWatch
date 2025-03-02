<?php 

include 'connectDB.php';
include 'consumptions.php';

$mon = 0;
$tue = 0;
$wed = 0;
$thu = 0;
$fri = 0;

$daySQL = "5";
switch(date("D")){
        case "Mon":
                $daySQL = "1";
                break;
        case "Tue":
                $daySQL = "2";
                break;
        case "Wed":
                $daySQL = "3";
                break;
        case "Thu":
                $daySQL = "4";
                break;
        case "Fri":
                $daySQL = "5";
                break;     
        default:
                $daySQL = 5;
                break;
}
$sql = "SELECT * FROM `weekly` WHERE `day` BETWEEN 1 AND $daySQL ORDER BY `timestamp` DESC LIMIT $daySQL";
$results = $conn->query($sql);
if ($results->num_rows > 0){
        while($rows = $results->fetch_assoc()){
                $line[] = $rows['value'];
        }
        $mon = !empty($line[0]) ? $line[0] : 0;
        $tue = !empty($line[1]) ? $line[1] : 0;
        $wed = !empty($line[2]) ? $line[2] : 0;
        $thu = !empty($line[3]) ? $line[3] : 0;
        $fri = !empty($line[4]) ? $line[4] : 0;
} else {
        $mon = 0;
        $tue = 0;
        $wed = 0;
        $thu = 0;
        $fri = 0;    
}

$_REQUEST['day'] = array(
        'mon' => bill($mon),
        'tues' => bill($tue),
        'wed' => bill($wed),
        'thurs' =>  bill($thu),
        'fri' => bill($fri)
);

echo json_encode($_REQUEST['day']);


?>      
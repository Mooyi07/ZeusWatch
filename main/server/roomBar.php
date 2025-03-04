<?php 

include 'connectDB.php';
include 'consumptions.php';

$d1_val = 0;
$d2_val = 0;
$d3_val = 0;

$d1 = "SELECT * FROM daily WHERE `room`='ECL' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd1 = $conn->query($d1);

$d2 = "SELECT * FROM daily WHERE `room`='MTB' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd2 = $conn->query($d2);

$d3 = "SELECT * FROM daily WHERE `room`='R19' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd3 = $conn->query($d3);

if ($resultsd1->num_rows > 0){
        while($data_d1 = $resultsd1->fetch_assoc()){
                $d1_val = floatval($data_d1["daily"]);
        }
} else {
        $d1_val = 0;
}

if ($resultsd2->num_rows > 0){
        while($data_d2 = $resultsd2->fetch_assoc()){
                $d2_val = floatval($data_d2["daily"]);
        }
} else {
        $d2_val = 0;
}

if ($resultsd3->num_rows > 0){
        while($data_d3 = $resultsd3->fetch_assoc()){
                $d3_val = floatval($data_d3["daily"]);
        }
} else {
        $d1_val = 0;
}

$_REQUEST['room'] = array(
        'r1' => bill($d1_val),
        'r2' => bill($d2_val),
        'r3' => bill($d3_val)
);

echo json_encode($_REQUEST['room']);


?>
<?php 
include 'consumptions.php';
include 'connectDB.php';

$d1 =  "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='MON'";
$d2 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='TUE'";
$d3 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='WED'";
$d4 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='THU'";
$d5 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='FRI'";

$resultsd1 = $conn->query($d2);
while($data_d1 = $resultsd1->fetch_assoc()){
    $d1_temp = $data_d1["temperature"];
    $d1_hum = $data_d1["humidity"];
}
$resultsd2 = $conn->query($d2);
while($data_d2 = $resultsd2->fetch_assoc()){
    $d2_temp = $data_d2["temperature"];
    $d2_hum = $data_d2["humidity"];
}
$resultsd3 = $conn->query($d3);
while($data_d3 = $resultsd3->fetch_assoc()){
    $d3_temp = $data_d3["temperature"];
    $d3_hum = $data_d3["humidity"];
}
$resultsd4 = $conn->query($d4);
while($data_d4 = $resultsd4->fetch_assoc()){
    $d4_temp = $data_d4["temperature"];
    $d4_hum = $data_d4["humidity"];
}
$resultsd5 = $conn->query($d5);
while($data_d5 = $resultsd5->fetch_assoc()){
    $d5_temp = $data_d5["temperature"];
    $d5_hum = $data_d5["humidity"];
}

function predVal($retval){
    $retval = abs(floatval($retval)) * 12;
    return $retval;
    
}

$_REQUEST['predicted'] = array(
        //'MO' => predVal(file_get_contents("http://127.0.0.1:5000/aiModel?dt=".$d1_temp."&dh=".$d1_hum."&dn=9")),
        'MO' => bill(predVal(file_get_contents("http://127.0.0.1:5000/aiModel?dt=".$d1_temp."&dh=".$d1_hum."&dn=8"))),
        'TU' => bill(predVal(file_get_contents("http://127.0.0.1:5000/aiModel?dt=".$d2_temp."&dh=".$d2_hum."&dn=8"))),
        'WE' => bill(predVal(file_get_contents("http://127.0.0.1:5000/aiModel?dt=".$d3_temp."&dh=".$d3_hum."&dn=8"))),
        'TH' => bill(predVal(file_get_contents("http://127.0.0.1:5000/aiModel?dt=".$d4_temp."&dh=".$d4_hum."&dn=8"))),
        'FR' => bill(predVal(file_get_contents("http://127.0.0.1:5000/aiModel?dt=".$d5_temp."&dh=".$d5_hum."&dn=8")))
);

echo json_encode($_REQUEST['predicted']);
?>
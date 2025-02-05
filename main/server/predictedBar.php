<?php 
include 'consumptions.php';
include 'connectDB.php';

$d1 =  "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='MON'";
$d2 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='TUE'";
$d3 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='WED'";
$d4 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='THU'";
$d5 = "SELECT `humidity`, `temperature` FROM predictedtemp WHERE `day`='FRI'";

$_REQUEST['predicted'] = array(
        'MO' => bill(floatval(file_get_contents("http://127.0.0.1:5000/aiModel?dt=31&dh=65&dn=8"))),
        'TU' => bill(floatval(file_get_contents("http://127.0.0.1:5000/aiModel?dt=33&dh=59&dn=8"))),
        'WE' => bill(floatval(file_get_contents("http://127.0.0.1:5000/aiModel?dt=30&dh=78&dn=8"))),
        'TH' => bill(floatval(file_get_contents("http://127.0.0.1:5000/aiModel?dt=29&dh=67&dn=8"))),
        'FR' => bill(floatval(file_get_contents("http://127.0.0.1:5000/aiModel?dt=30&dh=72&dn=8")))
);

echo json_encode($_REQUEST['predicted']);
?>
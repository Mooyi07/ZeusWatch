<?php 

include 'connectDB.php';

$_REQUEST['day'] = array(
        'mon' => 201.23,
        'tues' => 251.42,
        'wed' => 215.35,
        'thurs' => 282.76,
        'fri' => 184.52
);

echo json_encode($_REQUEST['day']);


?>
<?php 

include 'connectDB.php';

$_REQUEST['day'] = array(
        'mon' => 200.23,
        'tues' => 198.42,
        'wed' => 190.35,
        'thurs' => 195.76,
        'fri' => 203.34
);

echo json_encode($_REQUEST['day']);


?>
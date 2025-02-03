<?php 

include 'connectDB.php';

$_REQUEST['room'] = array(
        'r1' => 72.32,
        'r2' => 83.45,
        'r3' => 78.57
);

echo json_encode($_REQUEST['room']);


?>
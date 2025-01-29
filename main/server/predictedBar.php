<?php 
include 'consumptions.php';

$_REQUEST['predicted'] = array(
        'MO' => bill(16.22),
        'TU' => bill(18.08),
        'WE' => bill(16.30),
        'TH' => bill(17.91),
        'FR' => bill(15.53)
);

echo json_encode($_REQUEST['predicted']);
?>
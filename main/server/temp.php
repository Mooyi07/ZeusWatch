<?php 

$_REQUEST['tempHum'] = array(
    'r19Hum' => 85,
    'r19Temp'=> 58,
    'eclHum' => 65,
    'eclTemp'=> 32,
    'mtbHum' => 48,
    'mtbTemp'=> 30
);

echo json_encode($_REQUEST['tempHum']);

?>
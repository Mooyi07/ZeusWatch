<?php 
    include 'connectDB.php';

    $r19 = "SELECT id, humidity, temperature FROM roomtemp WHERE room='R19'";
    $ecl = "SELECT id, humidity, temperature FROM roomtemp WHERE room ='ECL'";
    $mtb = "SELECT id, humidity, temperature FROM roomtemp WHERE room ='MTB'";

    $result_r19 = $conn->query($r19);
    while($data_r19 = $result_r19->fetch_assoc()){
        $r19_hum = $data_r19["humidity"];
        $r19_temp = $data_r19["temperature"];
    }
    $result_ecl = $conn->query($ecl);
    while($data_ecl = $result_ecl->fetch_assoc()){
        $ecl_hum = $data_ecl["humidity"];
        $ecl_temp = $data_ecl["temperature"];
    }
    $result_mtb = $conn->query($mtb);
    while($data_mtb = $result_mtb->fetch_assoc()){
        $mtb_hum = $data_mtb["humidity"];
        $mtb_temp = $data_mtb["temperature"];
    }

    $_REQUEST['tempHum'] = array(
        'r19Hum' => $r19_hum,
        'r19Temp'=> $r19_temp,
        'eclHum' => $ecl_hum,
        'eclTemp'=> $ecl_temp,
        'mtbHum' => $mtb_hum,
        'mtbTemp'=> $mtb_temp
    );

    echo json_encode($_REQUEST['tempHum']);

?>
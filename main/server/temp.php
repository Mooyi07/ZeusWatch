<?php 
    include 'connectDB.php';

    $rooms = ['R19', 'ECL', 'MTB'];
    $tempHum = [];

    foreach ($rooms as $room) {
        $query = "SELECT humidity, temperature FROM roomtemp WHERE room='$room' LIMIT 1";
        $result = $conn->query($query);
        if ($data = $result->fetch_assoc()) {
            $tempHum[strtolower($room) . 'Hum'] = $data['humidity'];
            $tempHum[strtolower($room) . 'Temp'] = $data['temperature'];
        }
    }

    echo json_encode($tempHum);
?>

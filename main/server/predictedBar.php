<?php 
include 'consumptions.php';
include 'connectDB.php';

// Fetch all data in one query
$query = "SELECT `day`, `humidity`, `temperature` FROM predictedtemp WHERE `day` IN ('MON', 'TUE', 'WED', 'THU', 'FRI')";
$result = $conn->query($query);

$weatherData = [];
while ($row = $result->fetch_assoc()) {
    $dayShort = substr($row['day'], 0, 2); // Convert 'MON' -> 'MO'
    $weatherData[$dayShort] = [
        'temperature' => $row['temperature'],
        'humidity' => $row['humidity']
    ];
}

// Function to get predicted value
function predVal($temp, $hum) {
    $retval = 0;
    for ($count = 0; $count < 8; $count++) {
        $timeVal = $count + 8;
        if ($timeVal >= 12) $timeVal++;
        
        // AI Model API Call
        $apiUrl = "http://127.0.0.1:5000/aiModel?dt={$temp}&dh={$hum}&dn={$timeVal}";
        $retval += abs(floatval(file_get_contents($apiUrl)));
    }   
    return $retval;
}

// Compute predictions
$predicted = [];
foreach ($weatherData as $day => $data) {
    $predicted[$day] = predVal($data['temperature'], $data['humidity']);
}

// Return JSON response
echo json_encode($predicted);
?>

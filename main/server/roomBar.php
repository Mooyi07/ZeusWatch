<?php 

include 'connectDB.php';
include 'consumptions.php';

$d1_val = $d2_val = $d3_val = 0;

// Fetch latest daily consumption for each room
$d1_query = "SELECT daily FROM daily WHERE room='ECL' ORDER BY timestamp DESC LIMIT 1";
$d2_query = "SELECT daily FROM daily WHERE room='MTB' ORDER BY timestamp DESC LIMIT 1";
$d3_query = "SELECT daily FROM daily WHERE room='R19' ORDER BY timestamp DESC LIMIT 1";

$d1_result = $conn->query($d1_query);
$d2_result = $conn->query($d2_query);
$d3_result = $conn->query($d3_query);

if ($d1_result && $d1_result->num_rows > 0) {
    $d1_val = floatval($d1_result->fetch_assoc()["daily"]);
}

if ($d2_result && $d2_result->num_rows > 0) {
    $d2_val = floatval($d2_result->fetch_assoc()["daily"]);
}

if ($d3_result && $d3_result->num_rows > 0) {
    $d3_val = floatval($d3_result->fetch_assoc()["daily"]);
}

// Prepare response array
$response = array(
    'r1' => bill($d1_val),
    'r2' => bill($d2_val),
    'r3' => bill($d3_val)
);

// Return JSON response
echo json_encode($response);

?>

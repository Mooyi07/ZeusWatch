<?php
include 'connectDB.php';

// Fetch room state and occupancy in a single query
$roomStateQuery = "SELECT room, state, occupancy FROM roomstate WHERE room IN ('R19', 'ECL', 'MTB')";
$resultState = $conn->query($roomStateQuery);
$roomStates = [];

while ($row = $resultState->fetch_assoc()) {
    $roomStates[$row['room']] = [
        "state" => $row['state'],
        "occupancy" => $row['occupancy']
    ];
}

// Fetch room schedules in a single query
$scheduleQuery = "SELECT room, morning, afternoon FROM schedule WHERE room IN ('R19', 'ECL', 'MTB')";
$resultSchedule = $conn->query($scheduleQuery);
$roomSchedules = [];

while ($row = $resultSchedule->fetch_assoc()) {
    $roomSchedules[$row['room']] = [
        "morning" => $row['morning'],
        "afternoon" => $row['afternoon']
    ];
}


// Room details
$rooms = [
    "R19" => "Room 19",
    "ECL" => "Electronics Computer Laboratory",
    "MTB" => "Modern Technology Building"
];

$roomData = [];

foreach ($rooms as $key => $name) {
    $roomData[] = [
        "roomInitials" => $key,
        "roomName" => $name,
        "roomStatus" => $roomStates[$key]["state"] ?? "Unknown",
        "roomSchedule" => ($roomSchedules[$key]["morning"] ?? "No schedule") . ", " . ($roomSchedules[$key]["afternoon"] ?? "No schedule"),
        "roomVacancy" => $roomStates[$key]["occupancy"] ?? "Unknown",
        "roomID" => strtolower($key)
    ];
}

?>

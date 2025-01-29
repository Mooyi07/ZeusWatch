<?php
    include 'connectDB.php';

    $r19 = "SELECT id, state, occupancy FROM roomstate WHERE room='R19'";
    $ecl = "SELECT id, state, occupancy FROM roomstate WHERE room ='ECL'";
    $mtb = "SELECT id, state, occupancy FROM roomstate WHERE room ='MTB'";
    $result_r19 = $conn->query($r19);
    while($data_r19 = $result_r19->fetch_assoc()){
        $r19_state = $data_r19["state"];
        $r19_occupancy = $data_r19["occupancy"];
    }
    $result_ecl = $conn->query($ecl);
    while($data_ecl = $result_ecl->fetch_assoc()){
        $ecl_state = $data_ecl["state"];
        $ecl_occupancy = $data_ecl["occupancy"];
    }
    $result_mtb = $conn->query($mtb);
    while($data_mtb = $result_mtb->fetch_assoc()){
        $mtb_state = $data_mtb["state"];
        $mtb_occupancy = $data_mtb["occupancy"];
    }



    $room = array(
        [
            "roomInitials" => "R19", 
            "roomName" => "Room 19", 
            "roomStatus" => $r19_state, 
            "roomSchedule" => "8:15 AM - 12:00 PM 1A, 1:00 PM - 4:30 PM 3A", 
            "roomVacancy" => $r19_occupancy,
            "idTemp" => "r19"
        ],
        [
            "roomInitials" => "ECL", 
            "roomName" => "Electronics Computer Laborator", 
            "roomStatus" => $ecl_state, 
            "roomSchedule" => "8:15 AM - 12:00 PM 3A, 1:00 PM - 4:30 PM 2A", 
            "roomVacancy" => $ecl_occupancy,
            "idTemp" => "ecl"
        ],
        [
            "roomInitials" => "MTB", 
            "roomName" => "Modern Technology Building", 
            "roomStatus" => $mtb_state, 
            "roomSchedule" => "8:15 AM - 12:00 PM 4A, 1:00 PM - 4:30 PM 1A", 
            "roomVacancy" => $mtb_occupancy,
            "idTemp" => "mtb"
        ]
);

?>
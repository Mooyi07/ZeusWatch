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


    $r19Sched = "SELECT id, afternoon, morning FROM schedule WHERE room='R19'";
    $eclSched = "SELECT id, afternoon, morning FROM schedule WHERE room ='ECL'";
    $mtbSched = "SELECT id, afternoon, morning FROM schedule WHERE room ='MTB'";

    $result_r19 = $conn->query($r19Sched);
    while($data_r19 = $result_r19->fetch_assoc()){
        $r19_afternoon = $data_r19["afternoon"];
        $r19_morning = $data_r19["morning"];
    }
    $result_ecl = $conn->query($eclSched);
    while($data_ecl = $result_ecl->fetch_assoc()){
        $ecl_afternoon = $data_ecl["afternoon"];
        $ecl_morning = $data_ecl["morning"];
    }
    $result_mtb = $conn->query($mtbSched);
    while($data_mtb = $result_mtb->fetch_assoc()){
        $mtb_afternoon = $data_mtb["afternoon"];
        $mtb_morning = $data_mtb["morning"];
    }
    $room = array(
        [
            "roomInitials" => "R19", 
            "roomName" => "Room 19", 
            "roomStatus" => $r19_state, 
            "roomSchedule" => "".$r19_morning.", ".$r19_afternoon, 
            "roomVacancy" => $r19_occupancy,
            "idTemp" => "r19"
        ],
        [
            "roomInitials" => "ECL", 
            "roomName" => "Electronics Computer Laborator", 
            "roomStatus" => $ecl_state, 
            "roomSchedule" => "".$ecl_morning.", ".$ecl_afternoon, 
            "roomVacancy" => $ecl_occupancy,
            "idTemp" => "ecl"
        ],
        [
            "roomInitials" => "MTB", 
            "roomName" => "Modern Technology Building", 
            "roomStatus" => $mtb_state, 
            "roomSchedule" => "".$mtb_morning.", ".$mtb_afternoon, 
            "roomVacancy" => $mtb_occupancy,
            "idTemp" => "mtb"
        ]
);

?>
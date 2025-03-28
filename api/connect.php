<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    date_default_timezone_set("Asia/Manila");

    global $state;
    $state = 0;

    if (!empty($_REQUEST['api']) && $_REQUEST['api'] === "crhiz" && !empty($_REQUEST['room'])) {
        sqlSelect($_REQUEST['room']);
    }

    function sqlSelect($room) {
        global $conn;
        $sql = "SELECT state, adminStatus, occupancy FROM roomstate WHERE room = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $room);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $state = $row['state'];
            $adminStat = $row['adminStatus'];
            $occupancy = $row['occupancy'];
            
            if ($adminStat === "AUTOMATIC") {
                checkSched($room, $occupancy);
            } else {
                echo $state;
            }
        }
    }

    function checkSched($room, $occupancy) {
        global $conn;
        $sql = "SELECT morning, afternoon FROM schedule WHERE room = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $room);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $morning = $row['morning'];
            $afternoon = $row['afternoon'];
            $currentTime = date('H');
            
            if (($currentTime >= 8 && $currentTime < 12 && $morning !== "NULL" && $occupancy) ||
                ($currentTime >= 12 && $currentTime < 19 && $afternoon !== "NULL" && $occupancy)) {
                $state = 1;
            } else {
                $state = 0;
            }
            
            echo $state;
            
            $sqlUpdate = "UPDATE roomstate SET state = ? WHERE room = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("is", $state, $room);
            $stmtUpdate->execute();
        }
    }
?>
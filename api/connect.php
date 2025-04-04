<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    date_default_timezone_set("Asia/Manila");

    if (!empty($_REQUEST['api']) && $_REQUEST['api'] === "crhiz" && !empty($_REQUEST['room'])) {
        sqlSelect($_REQUEST['room']);
    }

    function sqlSelect($room) {
        global $conn;

        // Validate room input
        $room = sanitizeInput($room);
        
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
                checkSched($room, $occupancy, $state);
            } else {
                echo $state;
            }
        }
    }

    function checkSched($room, $occupancy, $state) {
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

            // Validate occupancy value before using it
            if (empty($occupancy) || $occupancy === "NULL") {
                $occupancy = 0; // Treat NULL as no occupancy
            }

            if (($currentTime >= 8 && $currentTime < 12 && $morning !== "NULL" && $occupancy) ||
                ($currentTime >= 12 && $currentTime < 19 && $afternoon !== "NULL" && $occupancy)) {
                $state = 1;
            } else {
                $state = 0;
            }

            echo $state;

            // Update state in the database
            $sqlUpdate = "UPDATE roomstate SET state = ? WHERE room = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("is", $state, $room);
            $stmtUpdate->execute();
        }
    }

    // Function to sanitize user inputs
    function sanitizeInput($input) {
        return htmlspecialchars(trim($input)); // Basic sanitization
    }
?>

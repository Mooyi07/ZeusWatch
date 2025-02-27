<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $GLOBALS['state'] = 0;
    $adminStat = "AUTOMATIC";

    if (!empty($_REQUEST['api'])){
        if ($_REQUEST['api'] = "crhiz" && !empty($_REQUEST['room'])){
            sqlSelect($_REQUEST['room']);
        }
    }
    function sqlSelect($room){
        $sql = "SELECT * FROM `roomstate` WHERE `room` = '$room'";
        $results = $GLOBALS['conn']->query($sql);
        while($row = $results->fetch_assoc()) {
            $state = $row['state'];
            $adminStat = $row['adminStatus'];
            $occupancy = $row['occupancy'];
        }
        if ($adminStat == "AUTOMATIC"){
            checkSched($_REQUEST['room'], $occupancy);
        } else {
            echo $state;
        }
    }
    
    function checkSched($room, $occupancy){
        $sql = "SELECT * FROM `schedule` WHERE `room` = '$room'";
        $results = $GLOBALS['conn']->query($sql);
        while($row = $results->fetch_assoc()) {
            $morning = $row['morning'];
            $afternoon = $row['afternoon'];
            $currentTime = date('H')+7;
            if ($currentTime > 7 && $currentTime < 12){
                if ($morning != "NULL" && $occupancy == 1){
                    $state = 1;
                } else {
                    $state = 0;
                }
                echo $state;
            } else if ($currentTime > 12 && $currentTime < 18){
                if ($afternoon != "NULL" && $occupancy == 1){
                    $state = 1;
                } else {
                    $state = 0;
                }
                echo $state;
            } else {
                $state = 1;
                echo $state;
            }
        }
        $sql = "UPDATE `roomstate` SET `state`='$state' WHERE `room`='$room'";
        $GLOBALS['conn']->query($sql);
    }

?>
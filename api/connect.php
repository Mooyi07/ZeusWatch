<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!empty($_REQUEST['api'])){
        if ($_REQUEST['api'] = "crhiz" && !empty($_REQUEST['room'])){
            sqlSelect($_REQUEST['room']);
            checkSched($_REQUEST['room']);
        }
    }
    function sqlSelect($room){
        $sql = "SELECT * FROM `roomstate` WHERE `room` = '$room'";
        $results = $GLOBALS['conn']->query($sql);
        while($row = $results->fetch_assoc()) {
            echo $row['state'];
        }
    }

    function checkSched($room){
        $sql = "SELECT * FROM `schedule` WHERE `room` = '$room'";
        $results = $GLOBALS['conn']->query($sql);
        while($row = $results->fetch_assoc()) {
            $morning = $row['morning'];
            $afternoon = $row['afternoon'];
            $currentTime = date('H')+7;
            if ($currentTime > 7 && $currentTime < 12){
                echo $morning;
                if ($morning == "08:15 AM - 12:00 PM"){
                    echo "S";
                } else {
                    echo "N";
                }
            } else if ($currentTime > 12 && $currentTime < 18){
                if ($afternoon == "01:00 PM - 04:30 PM"){
                    echo "S";
                } else {
                    echo "N";
                }
            } else {
                echo "N";
            }
        }
    }

?>
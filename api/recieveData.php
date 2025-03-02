<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch_db";

    // Create connection
    date_default_timezone_set("Asia/Manila");
    $conn = new mysqli($servername, $username, $password, $dbname);
    function checkDay(){
        if (date("w") > 0 && date("w") < 6){
            if (date('H') > 8 && date('H') < 16){
                return 1;
            } else if (date('H') == 16 && date('i') < 30) {
                return 1;
            } else if (date('H') == 8 && date('i') > 14) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    function insert($room, $value, $currentDate) {
        $sql = "INSERT INTO `daily`(`room`, `daily`, `timestamp`) VALUES ('$room','$value', '$currentDate')";
        $GLOBALS['conn']->query($sql);
        echo "INSERTED";
    }
    function update($room, $value, $pastVal, $occupancy, $temp, $humidity, $currentDate) {
        $newVal = $pastVal + $value;
        $sql = "UPDATE `daily` SET `daily`='$newVal',`timestamp`='$currentDate' WHERE `room`='$room' ORDER BY `id` DESC LIMIT 1";
        $GLOBALS['conn']->query($sql);

        $sql = "UPDATE `roomstate` SET `occupancy`='$occupancy' WHERE `room`='$room'";
        $GLOBALS['conn']->query($sql);

        $sql = "UPDATE `roomtemp` SET `temperature`='$temp',`humidity`='$humidity' WHERE `room`='$room'";
        $GLOBALS['conn']->query($sql);
        echo "UPDATED :".$newVal;
    }
    if (!empty($_POST['api'])){
        if ($_POST['api'] == "OknYUFT7V64hnfhsh9HUN" && !empty($_POST['current'])){
            $curr = !empty($_POST['current']) ? $_POST['current'] : 0;
            $occupancy = !empty($_POST['pir']) ? $_POST['pir'] : 0;
            $hum = !empty($_POST['humidity']) ? $_POST['humidity'] : 0;
            $room = !empty($_POST['room']) ? $_POST['room'] : "ECL";
            $temp = !empty($_POST['temp']) ? $_POST['temp'] : 0;

            $sql = "SELECT * FROM `daily` WHERE `room`='$room' ORDER BY `timestamp` DESC LIMIT 1";
            $results = $conn->query($sql);
            $rows = $results->fetch_assoc();
            
            $sqlDate = date('Y-m-d', strtotime($rows['timestamp']));
            $currentDate = date('Y-m-d');
            $curr = doubleval($curr) / 3600;
            $dater = date("Y-m-d H:i:s");
            if (checkDay()){
                if ($sqlDate != $currentDate){
                    insert($room, $curr, $dater);
                } else {
                    update($room, $curr, $rows['daily'], $occupancy, $temp, $hum, $dater);
                }
            }
        }
    }
?>
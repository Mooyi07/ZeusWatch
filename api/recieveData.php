<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    date_default_timezone_set("Asia/Manila");

    function isWorkingHours() {
        $hour = date('H');
        $minute = date('i');
        $dayOfWeek = date("w");

        return ($dayOfWeek > 0 && $dayOfWeek < 6) && (
            ($hour > 8 && $hour < 19) ||
            ($hour == 16 && $minute < 30) ||
            ($hour == 8 && $minute > 14)
        );
    }

    function insertData($room, $value, $timestamp) {
        global $conn;
        $sql = "INSERT INTO `daily`(`room`, `daily`, `timestamp`) VALUES ('$room', '$value', '$timestamp')";
        $conn->query($sql);
        echo "INSERTED";
    }

    function updateData($room, $value, $pastValue, $occupancy, $temp, $humidity, $timestamp) {
        global $conn;
        $newValue = $pastValue + $value;
        
        $conn->query("UPDATE `daily` SET `daily`='$newValue', `timestamp`='$timestamp' WHERE `room`='$room' ORDER BY `id` DESC LIMIT 1");
        $conn->query("UPDATE `roomstate` SET `occupancy`='$occupancy' WHERE `room`='$room'");
        $conn->query("UPDATE `roomtemp` SET `temperature`='$temp', `humidity`='$humidity' WHERE `room`='$room'");
        echo "UPDATED: $newValue";
        
        $rooms = ['ECL', 'R19', 'MTB'];
        $weeklyTotal = 0;
        
        foreach ($rooms as $r) {
            $result = $conn->query("SELECT `daily` FROM `daily` WHERE `room`='$r' ORDER BY `id` DESC LIMIT 1");
            if ($row = $result->fetch_assoc()) {
                $weeklyTotal += floatval($row['daily']);
            }
        }
        
        $conn->query("UPDATE `weekly` SET `value`=$weeklyTotal ORDER BY `id` DESC LIMIT 1");
    }

    if (!empty($_POST['api']) && $_POST['api'] == "OknYUFT7V64hnfhsh9HUN" && !empty($_POST['current'])) {
        $room = $_POST['room'] ?? "ECL";
        $current = ($_POST['current'] ?? 0) / 3600;
        $occupancy = $_POST['pir'] ?? 0;
        $humidity = $_POST['humidity'] ?? 0;
        $temperature = $_POST['temp'] ?? 0;
        $timestamp = date("Y-m-d H:i:s");

        $result = $conn->query("SELECT * FROM `daily` WHERE `room`='$room' ORDER BY `timestamp` DESC LIMIT 1");
        $row = $result->fetch_assoc();
        $lastDate = date('Y-m-d', strtotime($row['timestamp'] ?? ''));
        $currentDate = date('Y-m-d');

        if (isWorkingHours()) {
            if ($lastDate != $currentDate) {
                insertData($room, $current, $timestamp);
            } else {
                updateData($room, $current, $row['daily'], $occupancy, $temperature, $humidity, $timestamp);
            }
        }
    }
?>
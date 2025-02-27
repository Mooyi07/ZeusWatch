<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch";

    // Create connection
    date_default_timezone_set("Asia/Manila");
    $conn = new mysqli($servername, $username, $password, $dbname);
    // if (!empty($_POST['api'])){
    //     if ($_POST['api'] = "OknYUFT7V64hnfhsh9HUN" && !empty($_POST['room'])){
    //         $room = $_POST['room'];
    //         if(!empty($_POST['temp'])){
    //             $temp = $_POST['temp'];
    //             $hum = $_POST['hum'];
    //             $sql = "UPDATE `roomtemp` SET `temperature`='$temp',`humidity`='$hum' WHERE `room` = '$room'";
    //             $results = $conn->query($sql);
    //         }   
    //         if(!empty($_POST['current'])){
    //             $current = $_POST['current'];
    //             $sql = "SELECT `daily`(`daily`) VALUES ('$current') WHERE `room` = '$room' DESC";
    //             $results = $conn->query($sql);
    //             while($row = $results->fetch_assoc()){
    //                 $values = $row['daily'];
    //             }
    //             $values = $values + $current;
    //             $sql = "UPDATE SET `daily`(`$values`) VALUES ('$current') WHERE `room` = '$room' DESC";
    //         }
    //         if(!empty($_POST['occupancy'])){
    //             $occupancy = $_POST['occupancy'];
    //             $sql = "UPDATE `roomstate`(`occupancy`) VALUES ('$occupancy') WHERE `room` = '$room'";
    //             $results = $conn->query($sql);
    //         }
    //     }
    // }
    // if (!empty($_POST['api'])){
    //     if ($_POST['api'] = "OknYUFT7V64hnfhsh9HUN" && !empty($_POST['room'])){
    //         $_REQUEST['nodeMcu'] = array(
    //             'temp' => !empty($_POST['temp']) ? $_POST['temp'] : 0,
    //             'current' => !empty($_POST['current']) ? $_POST['current'] : 0,
    //             'occupancy' => !empty($_POST['occupancy']) ? $_POST['occupancy'] : 0,
    //             'room' =>  !empty($_POST['room']) ? $_POST['room'] : "EMPTY",
    //             'humidity' => !empty($_POST['hum']) ? $_POST['hum'] : 0
    //         );
    //         echo json_encode($_REQUEST['nodeMcu']);
    //     }
    // }
    function insert() {
        $sql = "INSERT INTO `daily`(`room`, `daily`) VALUES ('[value-1]','[value-2]')";
    }
    function update($value, $room) {
        $sql = "SELECT `daily` FROM `daily` WHERE `room`='$room' ORDER BY ID DESC LIMIT 1";
        $sql = "UPDATE `daily` SET `daily`='$value',`timestamp`='' WHERE `room`='$room' ORDER BY `id` DESC LIMIT 1";
    }
    if (!empty($_GET['api'])){
        if ($_POST['api'] = "OknYUFT7V64hnfhsh9HUN" && !empty($_GET['current'])){
            $curr = !empty($_GET['current']) ? $_GET['current'] : 0;
            $occupancy = !empty($_GET['pir']) ? $_GET['pir'] : 0;
            $hum = !empty($_GET['humidity']) ? $_GET['humidity'] : 0;
            $room = !empty($_GET['room']) ? $_GET['room'] : "ECL";
            $temp = !empty($_GET['temp']) ? $_GET['temp'] : 0;

            // $sql = "INSERT INTO `test`(`room`, `occupancy`, `current`, `hum`, `temp`) VALUES ('$room','$occupancy','$curr','$hum','$temp')";

            // $results = $conn->query($sql);

            echo "CURRENT: ".$curr." kwh<br>";
            echo "OCCUPANCY: ".$occupancy."<br>";
            echo "HUMIDITY: ". $hum."%<br>";
            echo "ROOM: ". $room."<br>";
            echo "TEMP: ". $temp." °C<br>";
        }
    }
?>
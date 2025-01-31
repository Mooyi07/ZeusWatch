<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!empty($_POST['api'])){
        if ($_POST['api'] = "OknYUFT7V64hnfhsh9HUN" && !empty($_POST['room'])){
            $room = $_POST['room'];
            if(!empty($_POST['temp'])){
                $temp = $_POST['temp'];
                $hum = $_POST['hum'];
                $sql = "UPDATE `roomval` SET `temperature`='$temp',`humidity`='$hum' WHERE `room` = '$room'";
                $results = $GLOBALS['conn']->query($sql);
            }   
            if(!empty($_POST['current'])){
                $current = $_POST['current'];
                $sql = "INSERT INTO `roomval`(`data`) VALUES ('$current') WHERE `room` = '$room'";
                $results = $GLOBALS['conn']->query($sql);
            }
        }
    }

?>
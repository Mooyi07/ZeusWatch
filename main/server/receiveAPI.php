<?php 

include 'connectDB.php';

$apiKey = "OknYUFT7V64hnfhsh9HUN";

if (!empty($_GET['apiReceive'])){
    if ($_GET['apiReceive'] == $apiKey){
        $room = $_GET['room'];
        if(!empty($_GET['currentVal'])){
            echo "Hello Current";
            $humVal = $_GET['currentVal'];
            //$sql = "INSERT INTO roomval (room, data) VALUES ('$room', '$currentVa')";
            //$conn->query($sql); 
        } else if (!empty($_GET['humVal'])){
            $humVal = $_GET['humVal'];
            $tempVal = $_GET['tempVal'];
            echo "humVal Inserted";
            //$sql = "INSERT INTO roomtemp (room, temperature, humidity) VALUES ('$room', '$tempVal', '$humVal')";
            //$conn->query($sql); 
        } else {
        }
    }
}

?>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_gathered";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!empty($_POST['current'])){
        $current = $_POST['current'];
        $temp = $_POST['temp'];
        $humidity = $_POST['humid'];
        $pir = $_POST['pir'];
        $sql = "INSERT INTO MyGuests (`pir`, `temp`, `humid`, `current`) VALUES ('$pir', '$temp', '$humidity', '$current')";

        echo "CURRENT: ".$current." | HUMIDITY: ".$humidity." | TEMPERATURE: ".$temp." | PIR: ". $pir;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }    
?>
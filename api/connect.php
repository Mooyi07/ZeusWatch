<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM `roomstate` WHERE `room` = 'ECL'";
    $results = $conn->query($sql);

    if (!empty($_GET['api'])){
        if ($_GET['api'] = "crhiz"){
            while($row = $results->fetch_assoc()) {
                echo $row['state'];
              }
        }
    }
    ?>
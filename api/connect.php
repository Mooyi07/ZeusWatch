<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!empty($_POST['api'])){
        if ($_POST['api'] = "crhiz" && !empty($_POST['room'])){
            sqlSelect($_POST['room']);
        }
    }
    
    function sqlSelect($room){
        $sql = "SELECT * FROM `roomstate` WHERE `room` = '$room'";
        $results = $GLOBALS['conn']->query($sql);
        while($row = $results->fetch_assoc()) {
            echo $row['state'];
        }
    }

?>
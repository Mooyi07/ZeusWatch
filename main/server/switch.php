<?php 
    include 'connectDB.php';

    $username = $_POST['username'];
    $state = $_POST['state'];
    $room = $_POST['room'];  
    $occupancy = $_POST['occupancy'];  
    
    $sql = "UPDATE roomstate SET state='$state' WHERE room='$room'";
    $conn->query($sql);

    $sql = "INSERT INTO history (username, room, state, occupancy) VALUES ('$username', '$room', '$state', '$occupancy')";
    $conn->query($sql);
?>
<?php 
    session_start();
    if(isset($_SESSION['username'])){
        
    } else {
        header("Location: ../");
    }
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $username = $_SESSION['username'];
    $displayName = $firstName." ".$lastName;

    $brand = "ZeusWatch";
    
    $apiKey = "OknYUFT7V64hnfhsh9HUN";
    
    
    $date = date("F d, Y")."<br>".date("l");
    $schoolStatus;

    if (date("l") == "Saturday" || date("l") == "Sunday"){
        $schoolStatus = 0;
    } else {
        $schoolStatus = 1;
    }

    $weekly = "";
    $weekly = $weekly."100000";
    function displayWeek($weekly, $dispWeek, $count) {
        for($i = strlen($weekly)-1; $i >= 0; $i--){
            if ($count == 3){
                $count = 0;
                $dispWeek = ",".$dispWeek;
            }
            else {
                $count++;
            }
            $dispWeek = $weekly[$i].$dispWeek;
        }
        echo $dispWeek;
    }
?>
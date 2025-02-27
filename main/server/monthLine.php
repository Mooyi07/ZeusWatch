<?php 

include 'connectDB.php';
include 'consumptions.php';

$m1_val = 0; $m2_val = 0; $m3_val = 0;
$m4_val = 0; $m5_val = 0; $m6_val = 0;
$m7_val = 0; $m8_val = 0; $m9_val = 0;
$m10_val = 0; $m11_val = 0; $m12_val = 0;

$m1 = "SELECT * FROM monthly WHERE `month`='JAN' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd1 = $conn->query($m1);

$m2 = "SELECT * FROM monthly WHERE `month`='FEB' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd2 = $conn->query($m2);

$m3 = "SELECT * FROM monthly WHERE `month`='MAR' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd3 = $conn->query($m3);

$m4 = "SELECT * FROM monthly WHERE `month`='APR' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd4 = $conn->query($m4);

$m5 = "SELECT * FROM monthly WHERE `month`='MAY' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd5 = $conn->query($m5);

$m6 = "SELECT * FROM monthly WHERE `month`='JUN' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd6 = $conn->query($m6);

$m7 = "SELECT * FROM monthly WHERE `month`='JUL' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd7 = $conn->query($m7);

$m8 = "SELECT * FROM monthly WHERE `month`='AUG' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd8 = $conn->query($m8);

$m9 = "SELECT * FROM monthly WHERE `month`='MAY' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd9 = $conn->query($m9);

$m10 = "SELECT * FROM monthly WHERE `month`='MAY' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd10 = $conn->query($m10);

$m11 = "SELECT * FROM monthly WHERE `month`='MAY' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd11 = $conn->query($m11);

$m12 = "SELECT * FROM monthly WHERE `month`='MAY' ORDER BY `timestamp` DESC LIMIT 1";
$resultsd12 = $conn->query($m12);

if ($resultsd1->num_rows > 0){
        while($data_d1 = $resultsd1->fetch_assoc()){
                $m1_val = floatval($data_d1["monthly"]);
        }
} else {
        $m1_val = 0;
}

if ($resultsd2->num_rows > 0){
        while($data_d2 = $resultsd2->fetch_assoc()){
                $m2_val = floatval($data_d2["monthly"]);
        }
} else {
        $m2_val = 0;
}

if ($resultsd3->num_rows > 0){
        while($data_d3 = $resultsd3->fetch_assoc()){
                $m3_val = floatval($data_d3["monthly"]);
        }
} else {
        $m3_val = 0;
}

if ($resultsd4->num_rows > 0){
        while($data_d4 = $resultsd4->fetch_assoc()){
                $m4_val = floatval($data_d4["monthly"]);
        }
} else {
        $m4_val = 0;
}

if ($resultsd5->num_rows > 0){
        while($data_d5 = $resultsd5->fetch_assoc()){
                $m5_val = floatval($data_d5["monthly"]);
        }
} else {
        $m5_val = 0;
}

if ($resultsd6->num_rows > 0){
        while($data_d6 = $resultsd6->fetch_assoc()){
                $m6_val = floatval($data_d6["monthly"]);
        }
} else {
        $m6_val = 0;
}
if ($resultsd7->num_rows > 0){
        while($data_d7 = $resultsd7->fetch_assoc()){
                $m7_val = floatval($data_d7["monthly"]);
        }
} else {
        $m7_val = 0;
}

if ($resultsd8->num_rows > 0){
        while($data_d8 = $resultsd8->fetch_assoc()){
                $m8_val = floatval($data_d8["monthly"]);
        }
} else {
        $m8_val = 0;
}

if ($resultsd9->num_rows > 0){
        while($data_d9 = $resultsd9->fetch_assoc()){
                $m9_val = floatval($data_d9["monthly"]);
        }
} else {
        $m9_val = 0;
}
if ($resultsd10->num_rows > 0){
        while($data_d10 = $resultsd10->fetch_assoc()){
                $m10_val = floatval($data_d10["monthly"]);
        }
} else {
        $m10_val = 0;
}

if ($resultsd11->num_rows > 0){
        while($data_d11 = $resultsd11->fetch_assoc()){
                $m11_val = floatval($data_d11["monthly"]);
        }
} else {
        $m11_val = 0;
}

if ($resultsd12->num_rows > 0){
        while($data_d12 = $resultsd12->fetch_assoc()){
                $m12_val = floatval($data_d12["monthly"]);
        }
} else {
        $m12_val = 0;
}



$_REQUEST['month'] = array(
        'Jan' => bill($m1_val),
        'Feb' => bill($m2_val),
        'Mar' => bill($m3_val),
        'Apr' => bill($m4_val),
        'May' => bill($m5_val),
        'Jun' => bill($m6_val),
        'Jul' => bill($m7_val),
        'Aug' => bill($m8_val),
        'Sep' => bill($m9_val),
        'Oct' => bill($m10_val),
        'Nov' => bill($m11_val),
        'Dec' => bill($m12_val)
);

echo json_encode($_REQUEST['month']);


?>
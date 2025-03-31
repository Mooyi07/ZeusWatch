<?php 

include 'connectDB.php';
include 'consumptions.php';

// Initialize array to store month values
$monthly_values = array_fill_keys(
    ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
    0
);

// Fetch all months in a single query
$sql = "SELECT `month`, `monthly` FROM monthly WHERE `month` IN 
        ('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC') 
        ORDER BY `timestamp` DESC";
        
$result = $conn->query($sql);

// Store latest results in the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $monthly_values[$row["month"]] = floatval($row["monthly"]);
    }
}

// Mapping for correct month labels
$formatted_months = [
    'Jan' => 'JAN', 'Feb' => 'FEB', 'Mar' => 'MAR', 'Apr' => 'APR', 'May' => 'MAY', 'Jun' => 'JUN',
    'Jul' => 'JUL', 'Aug' => 'AUG', 'Sep' => 'SEP', 'Oct' => 'OCT', 'Nov' => 'NOV', 'Dec' => 'DEC'
];

// Convert values using the bill() function
$_REQUEST['month'] = array_map(function ($key) use ($monthly_values) {
    return bill($monthly_values[$key]);
}, $formatted_months);

echo json_encode($_REQUEST['month']);


?>
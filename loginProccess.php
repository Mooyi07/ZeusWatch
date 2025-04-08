<?php 
include 'main/server/connectDB.php';
session_start();

// Regenerate session ID to prevent session fixation attacks
session_regenerate_id(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Trim and sanitize inputs
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        header("Location: index.php?error=empty_fields");
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT username, firstName, lastName, password FROM accounts WHERE username = '$username'";
    $result = $conn->query($sql);
    
    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if ($password == $row["password"]) {
            // Store user data in session securely
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];

            // Redirect to main page (dashboard)
            header("Location: main/");
            exit();
        }
    }

    // Redirect if login fails
    header("Location: index.php?wrong=1");
    exit();
}

$conn->close();
?>

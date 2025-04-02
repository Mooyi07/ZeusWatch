<?php 
include 'main/server/connectDB.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT username, firstName, lastName, password FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row["password"])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];


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

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

            // Implement 'Remember Me' securely with a cookie
            if (isset($_POST['remember'])) {
                $token = bin2hex(random_bytes(32)); // Generate secure token
                setcookie("rememberMe", $token, time() + (86400 * 30), "/", "", false, true);

                // Store token in DB (you need a tokens table for this)
                $token_sql = "UPDATE accounts SET remember_token = ? WHERE username = ?";
                $token_stmt = $conn->prepare($token_sql);
                $token_stmt->bind_param("ss", $token, $username);
                $token_stmt->execute();
                $token_stmt->close();
            }

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

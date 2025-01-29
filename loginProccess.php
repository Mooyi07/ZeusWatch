<?php 
    include 'main/server/connectDB.php';
    $username = $password = "";

    $sql = "SELECT username, firstName, lastName, password FROM accounts";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["username"] == $_POST['name']){
            if($row["password"] == $_POST['password']){
                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                if (isset($_POST['remember'])){
                  $_SESSION['savedUsername'] = $row['username'];
                  $_SESSION['savedPassword'] = $row['username'];
                }
                header("Location: main/");
                exit();
            }
          }
        }
    } 
      header("Location: index.php?wrong=1");
    $conn->close();
?>

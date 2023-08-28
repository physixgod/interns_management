<?php
session_start(); 

$error_message = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include('database/connection.php'); 

    $username = $_POST['username'];
    $password = $_POST['password'];



    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        
        $_SESSION['username'] = $username;
        header("Location: partials/datagraph.php");
        exit(); 
    } else {
        
        $error_message = "Incorrect username or password. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Internship Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginBody">
    <?php if (!empty($error_message)) { ?>
        <div id="errorMessage">
           <strong>ERROR:</strong> <p><?= $error_message ?></p>
        </div> 
    <?php } ?>
    <div class="container">
        <div class="loginHeader">
            <h1>InternHub</h1>
            <p>Internship Management System</p>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
        <div class="logo">
            <img src="images/telecomlogo.png" alt="Logo">
        </div>
    </div>
</body>
</html>

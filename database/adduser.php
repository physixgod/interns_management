<?php
session_start();
include('connection.php'); 

$table_name = $_POST['table'];
$id = $_POST['id'];
$first = $_POST['name'];
$last = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$job = $_POST['job'];
$username = $_POST['username'];

$insert = "INSERT INTO $table_name (id, first_name, last_name, email, password, job_position, username) 
VALUES ('$id', '$first', '$last', '$email', '$password', '$job', '$username')";

try {
    $conn->exec($insert);
    $response = array(
        'is_success' => true,
        'message' => $first . ' ' . $last . ' Successfully added to the system'
    );
} catch (PDOException $e) {
    $response = array(
        'is_success' => false,
        'message' => $e->getMessage()
    );
}
$_SESSION['response'] = $response;
header('Location: ../partials/add.php');

$conn = null;
?>

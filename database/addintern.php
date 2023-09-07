<?php
session_start();
include('../database/connection.php'); 
$table_name = $_SESSION['table'];
$id = $_POST['id'];
$first = $_POST['name'];
$last = $_POST['lastName'];
$email = $_POST['email'];
$cin = $_POST['cin'];
$mob = $_POST['mobilePhone'];
$college = $_POST['college'];
$diploma = $_POST['diploma'];
$speciality = $_POST['speciality'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate'];
$internship_type = $_POST['internshipType'];

$insert = "INSERT INTO $table_name (id, first_name, last_name, email, cin, mobile, college, diploma, speciality, start_date, end_date, internship_type,intership_status) VALUES ('$id', '$first', '$last', '$email', '$cin', '$mob', '$college', '$diploma', '$speciality', '$start_date', '$end_date', '$internship_type','Pending..')";

try {
    $conn->exec($insert);
    $response = array(
        'is_success' => true,
        'message' => $first . ' ' . $last . ' Successfully added to the system'
    );
} catch (PDOException $e) {
    $response = array(
        'is_success' => false, // Set it to false in case of an error
        'message' => $e->getMessage()
    );
}
$response = array(
    'is_success' => true,
    'message' => $first . ' ' . $last . ' Successfully added to the system'
);
$_SESSION['response'] = $response;
$_SESSION['intern_added'] = true;

// Redirect back to the page
header('Location: ../partials/usersadd.php');

$conn = null; 
?>

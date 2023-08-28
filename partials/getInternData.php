<?php
session_start();
include('../database/connection.php');

if (isset($_GET['cin'])) {
    $internCIN = intval($_GET['cin']); 

    try {
        $stmt = $conn->prepare("SELECT * FROM interns WHERE cin = :cin");
        $stmt->bindParam(":cin", $internCIN, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($data);
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Failed to fetch intern data']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request']);
}
?>

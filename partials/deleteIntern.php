<?php
session_start();
include('../database/connection.php');

if (isset($_GET['cin'])) {
    $internCIN = intval($_GET['cin']); 

    try {
        $stmt = $conn->prepare("DELETE FROM interns WHERE cin = :cin");
        $stmt->bindParam(":cin", $internCIN, PDO::PARAM_INT);
        $stmt->execute();

        $response = [
            'success' => true,
            'message' => 'Intern removed successfully.'
        ];
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid request.'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>

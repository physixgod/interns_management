<?php
session_start();
include('../database/connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];
    $id = intval($_POST['id']);

    if ($action === "upload") {
        // Handle update file logic here
        // For example, you can update the file in the database based on the provided ID
        // You can use SQL UPDATE statement to achieve this
        
        if ($_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
            $newFileContent = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            $updateQuery = "UPDATE files SET file_content = :file_content WHERE id = :id";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bindParam(':file_content', $newFileContent, PDO::PARAM_LOB);
            $stmt->bindParam(':id', $id);
            
            if ($stmt->execute()) {
                $_SESSION['workflow_message'] = "File updated successfully!";
            } else {
                $_SESSION['workflow_message'] = "File update failed!";
            }
        } else {
            $_SESSION['workflow_message'] = "File upload failed!";
        }
        
        header("Location: workflow.php");
        exit();
    } elseif ($action === "download") {
        // Handle download file logic here
        // For example, retrieve the file content from the database based on the provided ID
        
        // Example select query:
        $selectQuery = "SELECT file_content FROM files WHERE id = :id";
        $stmt = $conn->prepare($selectQuery);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $fileContent = $stmt->fetchColumn();
        
        if ($fileContent) {
            // Set appropriate headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="intern_file.txt"');
            
            // Output the file content to the response
            echo $fileContent;
            exit();
        } else {
            $_SESSION['workflow_message'] = "File not found!";
            header("Location: workflow.php");
            exit();
        }
    } else {
        $_SESSION['workflow_message'] = "Invalid action!";
        header("Location: workflow.php");
        exit();
    }
} else {
    header("Location: workflow.php");
    exit();
}
?>

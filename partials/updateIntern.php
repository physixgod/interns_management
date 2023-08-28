<?php
session_start();

$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=ims", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}





$data = json_decode(file_get_contents("php://input"), true);

$first_name = $data["first_name"];
$last_name = $data["last_name"];
$cin = $data["cin"];
$speciality = $data["speciality"];
$start_date = $data["start_date"];
$end_date = $data["end_date"];
$internship_type = $data["internship_type"];




// Exemple d'insertion dans une table (remplacez "utilisateur" par votre table)
$sql = "UPDATE interns 
        SET first_name = '$first_name', last_name = '$last_name', 
            speciality = '$speciality', start_date = '$start_date', 
            end_date = '$end_date', internship_type = '$internship_type' 
        WHERE cin = '$cin'";





if ($conn->query($sql) === true) {
    echo "Enregistrement réussi !";
}
















/*


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = $_POST;
    $js_code = 'console.log(' . $_POST . 
    ');';
        $internCIN = $updatedData['cin'];
    

    try {
        $updateQuery = "UPDATE interns SET 
                        first_name = :first_name, 
                        last_name = :last_name, 
                        speciality = :speciality, 
                        internship_type = :internship_type, 
                        start_date = :start_date, 
                        end_date = :end_date 
                        WHERE cin = :cin";

        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(":first_name", $updatedData['first_name']);
        $stmt->bindParam(":last_name", $updatedData['last_name']);
        $stmt->bindParam(":speciality", $updatedData['speciality']);
        $stmt->bindParam(":internship_type", $updatedData['internship_type']);
        $stmt->bindParam(":start_date", $updatedData['start_date']);
        $stmt->bindParam(":end_date", $updatedData['end_date']);
        $stmt->bindParam(":cin", $updatedData['cin']);
        $stmt->execute();

        $response = [
            'success' => true,
            'message' => 'Intern updated successfully.'
        ];
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ];
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request']);
}*/
?>

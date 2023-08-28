<?php
session_start();
include('../database/connection.php');

$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=ims", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


 
if (isset($_POST['save'])) {
    $first_name = $_POST["edit-first-name"];
    $last_name=$_POST["edit-last-name"];
    $cin=$_POST["edit-cin"];
    $speciality=$_POST["edit-speciality"];
    $startdate=$_POST["edit-startDate"];
    $enddate=$_POST["edit-endDate"];
    $intershiptype=$_POST["edit-internshipType"];
    


 

  $sql = "UPDATE interns 
  SET first_name = '$first_name',
      last_name  = '$last_name',
      speciality='$speciality',
    start_date='$startdate',
    end_date='$enddate',
      internship_type='$intershiptype' 
    WHERE cin = '$cin'
  ";

  if ($conn->query($sql) === true) {
    echo "La réservation a été supprimée avec succès.";
    header("Refresh:1");
  } 
} 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interns Management - Internship Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <script src="https://kit.fontawesome.com/6eae8b1d33.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <img src="../images/telecomlogo1.png" class="logotelecom" alt="Logo">
            <div class="dashboard_sidebar_user">
                <img src="../images/user.jpg" class="userimage" alt="user image" id="userImage" />
                <span>
                    <?php echo $_SESSION['username'] ?>
                </span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_menu_lists">
                    <li class="menuActive">
                        <a href="usersadd.php"><i class="fa fa-user-plus" aria-hidden="true"></i><span
                                class="menuText">Add new intern</span></a>
                    </li>
                    <li>
                        <a href="internsm.php"><i class="fa fa-users" aria-hidden="true"></i><span
                                class="menuText">Interns Management</span></a>
                    </li>
                    <li>
                        <a href="search.php"><i class="fa fa-search" aria-hidden="true"></i><span class="menuText">
                                Search</span></a>
                    </li>
                    <li>
                        <a href="datagraph.php"><i class="fa-solid fa-chart-simple"></i><span class="menuText"> Statiscs</span></a>
                    </li>
                    <li>
                        <a href="datagraph.php"><i class="fa fa-user" aria-hidden="true"></i><span class="menuText">
                                Add User</span></a>
                    </li>
                    <li>
                        <a href="workflow.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="menuText">
                                workflow</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard_topNav">
                <a href="" id="toogleBtn"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <a href="../login.php" id="logoutBtn"><i class="fa fa-power-off" aria-hidden="true"></i>Log-out</a>
            </div>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row mt-5">
                        <div class="col">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>CIN</th>
                                            <th>Speciality</th>
                                            <th>Type of Internship</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php
                                        $query = "SELECT * FROM interns";
                                        $stmt = $conn->query($query);
                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['first_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['last_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['cin'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['speciality'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['internship_type'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['start_date'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['end_date'] ?>
                                                </td>
                                                <td class="actions">
                                                    <a href="javascript:void(0);" class="edit-button"
                                                        data-id="<?php echo $row['cin'] ?>">Edit</a>
                                                    <a href="javascript:void(0);" class="delete-button"
                                                        data-cin="<?php echo $row['cin'] ?>">Remove</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                    <form id="edit-form" class="hidden" method="POST" action="">
                                        <label for="edit-first-name">First Name:</label>
                                        <input type="text" id="edit-first-name" name="edit-first-name">
                                        <label for="edit-last-name">Last Name:</label>
                                        <input type="text" id="edit-last-name" name="edit-last-name">
                                        <label for="edit-cin">CIN:</label>
                                        <input type="number" id="edit-cin" name="edit-cin" readonly>
                                        <label for="edit-speciality">Speciality:</label>
                                        <input type="text" id="edit-speciality" name="edit-speciality">
                                        <label for="edit-startDate">Start Date:</label>
                                        <input type="date" id="edit-startDate" name="edit-startDate">
                                        <label for="edit-endDate">End Date:</label>
                                        <input type="date" id="edit-endDate" name="edit-endDate">
                                        <label for="edit-internshipType">Type of Internship:</label>
                                        <input type="text" id="edit-internshipType" name="edit-internshipType">
                                        <button type="submit" class="sa" id="save-edit" name="save">Save</button>
                                        <button type="button" id="cancel-edit">Cancel</button>
                                    </form>
                                    
                                        <script src="../js/your-js-file.js"></script>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function () {
                                                const deleteButtons = document.querySelectorAll(".delete-button");

                                                deleteButtons.forEach(button => {
                                                    button.addEventListener("click", function () {
                                                        const internCIN = parseInt(this.getAttribute("data-cin"));
                                                        const confirmed = confirm("Do you really want to remove this intern?");

                                                        if (confirmed) {
                                                            fetch(`deleteIntern.php?cin=${internCIN}`, { method: "POST" })
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    if (data.success) {
                                                                        alert(data.message);
                                                                        location.reload();
                                                                    } else {
                                                                        alert(data.message);
                                                                    }
                                                                })
                                                                .catch(error => {
                                                                    console.error("Error:", error);
                                                                });
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>

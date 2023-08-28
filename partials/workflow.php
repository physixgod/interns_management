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

if (isset($_POST['update'])) {
    $id = intval($_POST["id"]);
    $tasks = $_POST['tasks'];
    $sql = "UPDATE interns 
            SET tasks = :tasks
            WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tasks', $tasks, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Refresh:0");
    } else {
        echo "Error updating tasks: " . $stmt->errorInfo()[2];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - Internship Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" href="css/font-aweso me/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/6eae8b1d33.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                        <a href="datagraph.php"><i class="fa-solid fa-chart-simple"></i><span class="menuText">
                                Statiscs</span></a>
                    </li>
                    <li>
                        <a href="add.php"><i class="fa fa-user" aria-hidden="true"></i><span class="menuText">
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
                    <div class="workflow-form">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Speciality</th>
                                <th>Tasks</th>
                                <th>Action</th>
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
                                        <?php echo $row['speciality'] ?>
                                    </td>
                                    <td class="tasks">
                                        <form method="post">
                                            <textarea name="tasks"
                                                class="form-control"><?php echo $row['tasks'] ?></textarea>
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                        
                                    </td>
                                    <td class="actions" id="act">
                                        <input type="submit" name="update" value="Save" id="ra">
                                    </td>
                                </tr>
                                </form>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>

    </script>
</body>

</html>
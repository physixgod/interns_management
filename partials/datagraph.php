<?php
session_start();
include('../database/connection.php');


$collegeQuery = "SELECT college, COUNT(*) as count FROM interns GROUP BY college";
$collegeStmt = $conn->query($collegeQuery);
$collegeData = $collegeStmt->fetchAll(PDO::FETCH_ASSOC);


$specialityQuery = "SELECT speciality, COUNT(*) as count FROM interns GROUP BY speciality";
$specialityStmt = $conn->query($specialityQuery);
$specialityData = $specialityStmt->fetchAll(PDO::FETCH_ASSOC);


$internshipTypeQuery = "SELECT internship_type, COUNT(*) as count FROM interns GROUP BY internship_type";
$internshipTypeStmt = $conn->query($internshipTypeQuery);
$internshipTypeData = $internshipTypeStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statiscs - Internship Management System</title>
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
                <div class="chart-container">
                    <div class="chart">
                        <canvas id="collegeChart"></canvas>
                    </div>
                    <div class="chart">
                        <canvas id="specialityChart"></canvas>
                    </div>
                    <div class="chart">
                        <canvas id="internshipTypeChart"></canvas>
                    </div>
                    <script>
                        var collegeData = <?php echo json_encode($collegeData); ?>;
                        var specialityData = <?php echo json_encode($specialityData); ?>;
                        var internshipTypeData = <?php echo json_encode($internshipTypeData); ?>;


                        var chartColors = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#56CC9D"];


                        var collegeChart = new Chart(document.getElementById("collegeChart"), {
                            type: 'pie',
                            data: {
                                labels: collegeData.map(item => item.college),
                                datasets: [{
                                    data: collegeData.map(item => item.count),
                                    backgroundColor: chartColors.slice(0, collegeData.length),
                                }]
                            }
                        });

                        var specialityChart = new Chart(document.getElementById("specialityChart"), {
                            type: 'pie',
                            data: {
                                labels: specialityData.map(item => item.speciality),
                                datasets: [{
                                    data: specialityData.map(item => item.count),
                                    backgroundColor: chartColors.slice(0, specialityData.length),
                                }]
                            }
                        });

                        var internshipTypeChart = new Chart(document.getElementById("internshipTypeChart"), {
                            type: 'pie',
                            data: {
                                labels: internshipTypeData.map(item => item.internship_type),
                                datasets: [{
                                    data: internshipTypeData.map(item => item.count),
                                    backgroundColor: chartColors.slice(0, internshipTypeData.length),
                                }]
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/script.js"></script>

    </script>
</body>

</html>
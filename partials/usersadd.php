<?php
session_start();

$_SESSION['table'] = 'interns';
if (isset($_SESSION['response'])) {
    $response_message = $_SESSION['response']['message'];
    $is_success = $_SESSION['response']['is_success'];

    // Unset the session variable
    unset($_SESSION['response']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Intern- Internship Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" href="css/font-aweso me/css/font-awesome.min.css">
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
                    <div class="intern-form" id="internForm">
                        <form action="../database/addintern.php" method="POST" class="appForm">
                            <label for="id">ID:</label>
                            <input class="appFormInput" type="number" id="id" name="id" >
                            <label for="name">First Name:</label>
                            <input class="appFormInput" type="text" id="name" name="name" required>
                            <label for="lastName">Last Name:</label>
                            <input class="appFormInput" type="text" id="lastName" name="lastName" required>
                            <label for="email">Email:</label>
                            <input class="appFormInput" type="text" id="email" name="email" required>
                            <label for="cin">CIN:</label>
                            <input class="appFormInput" type="number" id="cin" name="cin" required>
                            <label for="mobilePhone">Mobile Phone:</label>
                            <input class="appFormInput" type="tel" id="mobilePhone" name="mobilePhone" required>
                            <label for="college">College:</label>
                            <input class="appFormInput" type="text" id="college" name="college" required>
                            <label for="diploma">Diploma:</label>
                            <input class="appFormInput" type="text" id="diploma" name="diploma" required>
                            <label for="speciality">Speciality:</label>
                            <input class="appFormInput" type="text" id="speciality" name="speciality" required>
                            <label for="startDate">Start Date:</label>
                            <input class="appFormInput" type="date" id="startDate" name="startDate" required>
                            <label for="endDate">End Date:</label>
                            <input class="appFormInput" type="date" id="endDate" name="endDate" required>
                            <label for="internshipType">Type of Internship:</label>
                            <input class="appFormInput" type="text" id="internshipType" name="internshipType" required>
                            <input type="hidden" name="table" value="interns" />
                            <button type="submit"><i class="fa fa-plus" aria-hidden="true"></i>Add Intern</button>
                        </form>
                        <div class="intern-added-message">
                            <p>
                                Intern added to the system.
                            </p>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const internAddedMessage = document.querySelector('.intern-added-message');
                                const internAdded = <?php echo isset($_SESSION['intern_added']) && $_SESSION['intern_added'] ? 'true' : 'false'; ?>;

                                if (internAdded) {
                                    internAddedMessage.style.display = "block";
                                    <?php unset($_SESSION['intern_added']); ?>
                                }
                            });
                        </script>




                    </div>
                </div>
            </div>
        </div>
        <script src="../js/script.js"></script>

</body>

</html>
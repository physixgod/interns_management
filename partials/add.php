<?php
session_start();

$_SESSION['table'] = 'users';
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
                        <a href="../homepage.php"><i class="fa fa-home" aria-hidden="true"></i><span
                                class="menuText">Home</span></a>
                    </li>
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
                        Statistics</span></a>
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
                        <form action="../database/addnewuser.php" method="POST" class="appForm">
                            <label for="id">ID:</label>
                            <input class="appFormInput" type="number" id="id" name="id">
                            <label for="username">Username:</label>
                            <input class="appFormInput" type="text" id="username" name="username" required>
                            <label for="name">First Name:</label>
                            <input class="appFormInput" type="text" id="name" name="name" required>
                            <label for="lastName">Last Name:</label>
                            <input class="appFormInput" type="text" id="lastName" name="lastName" required>
                            <label for="email">Email:</label>
                            <input class="appFormInput" type="text" id="email" name="email" required>
                            <label for="password">Password:</label>
                            <input class="appFormInput" type="password" id="password" name="password" required>
                            <label for="name">Job Position:</label>
                            <input class="appFormInput" type="text" id="job" name="job" required>
                            <input type="hidden" name="table" value="users" />
                            <button type="submit"><i class="fa fa-plus" aria-hidden="true"></i>Add User</button>
                        </form>
                        <div class="user-added-message">
                            <p>
                                User added to the system.
                            </p>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const userAddedMessage = document.querySelector('.user-added-message');
                                const userAdded = <?php echo isset($_SESSION['user_added']) && $_SESSION['user_added'] ? 'true' : 'false'; ?>;

                                if (userAdded) {
                                    userAddedMessage.style.display = "block";
                                    <?php unset($_SESSION['user_added']); ?>
                                }
                            });
                        </script>

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
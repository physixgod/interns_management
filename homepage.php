<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Internship Management System</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/6eae8b1d33.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="dashboardMainContainer">
    <div class="dashboard_sidebar" id="dashboard_sidebar">
    <img src="images/telecomlogo1.png" class="logotelecom" alt="Logo">
        <div class="dashboard_sidebar_user">
            <img src="images/user.jpg" class="userimage"alt="user image" id="userImage"/>
            <span><?php echo $_SESSION['username'] ?></span>
        </div>
        <div  class="dashboard_sidebar_menus">
            <ul class="dashboard_menu_lists">
                <li class="menuActive">
                    <a href="partials/usersadd.php" ><i class="fa fa-user-plus" aria-hidden="true"></i><span class="menuText">Add new intern</span></a>
                </li>
                <li>
                    <a href="partials/internsm.php"><i class="fa fa-users" aria-hidden="true"></i><span class="menuText">Interns Management</span></a>
                </li>
                <li>
                    <a href="partials/search.php"><i class="fa fa-search" aria-hidden="true"></i><span class="menuText"> Search</span></a>
                </li>

                <li>
                    <a href="partials/datagraph.php"><i class="fa-solid fa-chart-simple"></i><span class="menuText"> Statiscs</span></a>
                </li> 
                <li>
                    <a href="partials/add.php"><i class="fa fa-user" aria-hidden="true"></i><span class="menuText"> Add user</span></a>
                </li> 
            </ul>
        </div>
    </div>
    <div class="dashboard_content_container" id="dashboard_content_container">
        <div class="dashboard_topNav">
            <a href="" id="toogleBtn"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <a href="login.php" id="logoutBtn"><i class="fa fa-power-off" aria-hidden="true"></i>Log-out</a>
        </div>
        <div class="dashboard_content">
            <div class="dashboard_content_main"></div>
        </div>
    </div>
</div>
<script src="js/script.js"></script>

</script>
</body>
</html>
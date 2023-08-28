<?php
session_start();
include('../database/connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['search-query'];

    // Query to search for interns based on first name, last name, or CIN
    $query = "SELECT * FROM interns 
              WHERE first_name LIKE :searchQuery 
              OR last_name LIKE :searchQuery 
              OR cin = :searchQueryInt";

    $stmt = $conn->prepare($query);
    $searchParam = '%' . $searchQuery . '%';
    $searchQueryInt = intval($searchQuery);

    $stmt->bindParam(":searchQuery", $searchParam);
    $stmt->bindParam(":searchQueryInt", $searchQueryInt, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search- Internship Management System</title>
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
                    <div class="searchform">
                        <form method="POST">
                            <div class="a1"><input class="inputsearch" type="text" id="search-query" name="search-query"></div>
                            <div class="a2"><button class="sr" type="submit"><i class="fa fa-search"
                                    aria-hidden="true"></i>Search</button>
                            </div>
                        </form>
                    </div>

                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($results)): ?>
                        <h2 class="srtitle">Search Results</h2>
                        <?php if (count($results) > 0): ?>
                            <table class="lol">
                                <tr>
                                    <th class="tab">First Name</th>
                                    <th class="tab">Last Name</th>
                                    <th class="tab">CIN</th>
                                </tr>
                                <?php foreach ($results as $row): ?>
                                    <tr>
                                        <td class="tab">
                                            <?php echo $row['first_name']; ?>
                                        </td>
                                        <td class="tab">
                                            <?php echo $row['last_name']; ?>
                                        </td>
                                        <td class="tab">
                                            <?php echo $row['cin']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php else: ?>
                            <p class="parag">No results found.</p>
                        <?php endif; ?>
                    <?php endif; ?>
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
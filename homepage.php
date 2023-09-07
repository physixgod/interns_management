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
    <link rel="stylesheet" type="text/css" href="css/fot.css">
    <script src="https://kit.fontawesome.com/6eae8b1d33.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <img src="images/telecomlogo1.png" class="logotelecom" alt="Logo">
            <div class="dashboard_sidebar_user">
                <img src="images/user.jpg" class="userimage" alt="user image" id="userImage" />
                <span>
                    <?php echo $_SESSION['username'] ?>
                </span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_menu_lists">
                    <li class="menuActive">
                        <a href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i><span
                                class="menuText">Home</span></a>
                    </li>
                    <li class="menuActive">
                        <a href="partials/usersadd.php"><i class="fa fa-user-plus" aria-hidden="true"></i><span
                                class="menuText">Add new intern</span></a>
                    </li>
                    <li>
                        <a href="partials/internsm.php"><i class="fa fa-users" aria-hidden="true"></i><span
                                class="menuText">Interns Management</span></a>
                    </li>
                    <li>
                        <a href="partials/search.php"><i class="fa fa-search" aria-hidden="true"></i><span
                                class="menuText"> Search</span></a>
                    </li>

                    <li>
                        <a href="partials/datagraph.php"><i class="fa-solid fa-chart-simple"></i><span class="menuText">
                                Statiscs</span></a>
                    </li>
                    <li>
                        <a href="partials/add.php"><i class="fa fa-user" aria-hidden="true"></i><span class="menuText">
                                Add user</span></a>
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
                <a href="login.php" id="logoutBtn"><i class="fa fa-power-off" aria-hidden="true"></i>Log-out</a>
            </div>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <h1 >Welcome to the Internship Management System</h1>
                    <p class="p1">
                    Our platform is meticulously crafted to simplify the process of managing internships for organizations 
                    and their administrators. Whether you represent an organization looking for talented interns, our platform has you covered.
                    </p>
                    <p class="p2">
                        Key Features:
                    </p>
                    <ul class="l1">
                        <li class="l2">User-Friendly and very easy to Use.<li>
                        <li class="l2">Manage and track internship applications and progress.</li>
    
                        <li class="l2">Gain insights through internship statistics and data.</li>
                    </ul>
                    <p class="p3">
                        Get started today by exploring the options in the sidebar and taking advantage of the powerful
                        tools we offer to enhance your internship anagement experience.
                    </p>

                </div>
                <div class="container-sm  ">

                    <div class="radius-75 border-gray mx-4 d-flex justify-content-center py-3 aide-footer">

                        <div class="row2 custom-row-class align-content-center justify-content-center w-100   ">

                            <a class="text-decoration-none black-2-main " href="tel:71001298" title="71001298"></a>

                            <div class="col-sm-5 col-md-5 col-lg-2 text-center aide-item p-1 ">
                                <a class="text-decoration-none black-2-main " href="tel:71001298" title="71001298">
                                    <img class="pb-2" src="https://www.tunisietelecom.tn/assets/svg/phone-icon.svg"
                                        alt="71001298">
                                </a>
                                <p class="light line-height-115 font-22">
                                    <a class="text-decoration-none black-2-main " href="tel:71001298"
                                        title="71001298">Appeler le
                                        <span class="bold"> </span></a>
                                    <a class="text-decoration-none black-2-main bold " href="tel:1298"
                                        title="71001298">1298</a> ou le
                                    <span class="bold" style="display: inline-block;">
                                        <a class="text-decoration-none black-2-main  " href="tel:71001298">71001298</a>
                                    </span>
                                </p>
                            </div>

                            <div class="p-0 m-0 d-inline-flex align-self-center bg-dark  divider-black"></div>

                            <div class="col-sm-5 col-md-5 col-lg-2 text-center aide-item p-1">
                                <a class="text-decoration-none black-2-main"
                                    href="https://www.facebook.com/TunisieTelecom/" target="_blank" title="Messenger">
                                    <img class="pb-2" src="https://www.tunisietelecom.tn/assets/svg/messenger-icon.svg"
                                        alt="Messenger">
                                    <p class="light line-height-115">Nous contacter sur<span class="bold"> Messenger
                                        </span></p>
                                </a>
                            </div>

                            <div
                                class="p-0 m-0 d-inline-flex align-self-center bg-dark  divider-black d-none d-lg-block">
                            </div>

                            <div class="col-sm-5 col-md-5 col-lg-2 text-center aide-item p-1">
                                <a class="text-decoration-none black-2-main"
                                    href="/particulier/assistance/couverture-reseau/#Couverture%20Réseau"
                                    title="Couverture Réseau" target="_blank">
                                    <img class="pb-2" src="https://www.tunisietelecom.tn/assets/svg/discovery-icon.svg"
                                        alt="Couverture Réseau">
                                    <p class="light line-height-115">Couverture<span class="bold"> réseau </span></p>
                                </a>
                            </div>

                            <div class="p-0 m-0 d-inline-flex align-self-center bg-dark  divider-black"></div>

                            <div class="col-sm-5 col-md-5 col-lg-2 text-center aide-item p-1">
                                <a class="text-decoration-none black-2-main" href="/particulier/trouver-un-espace-tt/"
                                    target="_blank" title="Trouver un espace TT">
                                    <img class="pb-2" src="https://www.tunisietelecom.tn/assets/svg/position-icon.svg"
                                        width="40px" alt="Trouver un espace TT">
                                    <p class="light line-height-115">Trouver<span class="bold"> un Espace TT</span></p>
                                </a>
                            </div>

                            <div
                                class="p-0 m-0 d-inline-flex align-self-center bg-dark  divider-black d-none d-lg-block">
                            </div>

                            <div
                                class="col-sm-12 col-md-3 col-xs-12 text-center justify-content-center align-self-center d-flex  social-media ">
                                <div class=" d-inline-grid">
                                    <div class="row2 w-fit">
                                        <div class="col py-1 text-center right-bottom  ">
                                            <a href="https://www.facebook.com/TunisieTelecom/" target="_blank"
                                                title="Facebook">
                                                <img src="https://www.tunisietelecom.tn/assets/svg/fb.svg"
                                                    class="p-1 social-icon" alt="Facebook">
                                            </a>
                                        </div>
                                        <div class="col py-1 text-center left-bottom right-bottom">
                                            <a href="https://twitter.com/_TunisieTelecom" target="_blank"
                                                title="Twitter">
                                                <img src="https://www.tunisietelecom.tn/assets/svg/twitter.svg"
                                                    class="p-1 social-icon" alt="Twitter">
                                            </a>
                                        </div>
                                        <div class="col py-1 text-center  left-bottom   ">
                                            <a href="https://tn.linkedin.com/company/tunisie-t-l-com" target="_blank"
                                                title="LinkedIn">
                                                <img src="https://www.tunisietelecom.tn/assets/svg/linkedin.svg"
                                                    class="p-1 social-icon" alt="LinkedIn">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row2 w-fit">
                                        <div class="col py-1 text-center top-right">
                                            <a href="https://www.instagram.com/tunisietelecom/" target="_blank"
                                                title="Instagram">
                                                <img src="https://www.tunisietelecom.tn/assets/svg/ig.svg"
                                                    class="p-1 social-icon" alt="Instagram">
                                            </a>
                                        </div>
                                        <div class="col py-1 text-center top-left top-right">
                                            <a href="https://www.youtube.com/c/groupeTT" target="_blank"
                                                title="YouTube">
                                                <img src="https://www.tunisietelecom.tn/assets/svg/youtube.svg"
                                                    class="p-1 social-icon" alt="YouTube">
                                            </a>
                                        </div>
                                        <div class="col py-1 text-center top-left  ">
                                            <a href="https://www.tiktok.com/@tunisie.telecom?lang=fr" target="_blank"
                                                title="TikTok">
                                                <img src="https://www.tunisietelecom.tn/assets/svg/tiktok.svg"
                                                    class="p-1 social-icon" alt="TikTok">
                                            </a>
                                        </div>

                                    </div>
                                    <p class="light line-height-115">Nos <span class="bold"> Réseaux Sociaux</span></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <script src="js/script.js"></script>
            <footer class="bg-white">
                <div class="container py-5">
                    <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                        <h6 class="text-uppercase font-weight-bold mb-4">My TT</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a
                                    href="https://myspace.tunisietelecom.tn/_layouts/15/MCS.TT.Internet.UI.Selfcare/SignInPage.aspx?ReturnUrl=%2fParticulier%2f_layouts%2f15%2fAuthenticate.aspx%3fSource%3d%252FParticulier%252FPages%252FTT%252DCash%252Easpx&Source=%2FParticulier%2FPages%2FTT%2DCash%2Easpx"
                                    class="text-muted">Recharge TT</a></li>
                            <li class="mb-2"><a href="https://myspace.tunisietelecom.tn/Pages/Paiement-Facture0.aspx"
                                    class="text-muted">Paiement facture</a></li>
                            <li class="mb-2"><a
                                    href="https://myspace.tunisietelecom.tn/Pages/Transfert-solde-et-Internet.aspx"
                                    class="text-muted">Transfert</a></li>
                            <li class="mb-2"><a
                                    href="https://myspace.tunisietelecom.tn/_layouts/15/MCS.TT.Internet.UI.Selfcare/SignInPage.aspx?ReturnUrl=%2fParticulier%2f_layouts%2f15%2fAuthenticate.aspx%3fSource%3d%252FParticulier%252FPages%252FAchatForfait%252Easpx&Source=%2FParticulier%2FPages%2FAchatForfait%2Easpx"
                                    class="text-muted">Achat internet</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                        <h6 class="text-uppercase font-weight-bold mb-4">Espace Entreprise</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="https://www.tunisietelecom.tn/Entreprise/Inscription"
                                    class="text-muted">Inscription</a></li>
                            <li class="mb-2"><a href="https://myspace.tunisietelecom.tn/Pages/D_SuiviConsommation.aspx#"
                                    class="text-muted">Suivi de consommation</a></li>
                            <li class="mb-2"><a href="https://myspace.tunisietelecom.tn/Pages/Paiement-Facture0.aspx#"
                                    class="text-muted">Paiement des factures</a></li>
                            <li class="mb-2"><a href="https://myspace.tunisietelecom.tn/Pages/Achat-TTCash.aspx#"
                                    class="text-muted">Recharge TT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="bg-light py-4">
                    <div class="container text-center">
                        <img loading="lazy" src="https://www.tunisietelecom.tn/assets/svg/logo-small.svg"
                            alt="Logo Tunisie Telecom">

                        <p class="text-muted mb-0 py-2">© 2023 Tunisie Telecom - Tous droits réservés.</p>
                    </div>
                </div>
        </div>

        <!-- Copyrights -->

        </footer>
        </script>
</body>

</html>
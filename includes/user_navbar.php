<?php
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE email='$email'";
        $query_run = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($query_run);
    }
?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="admin_dashboard.php"><?php echo $user['username']; ?></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <form action="login.php">
                  <button type="submit" name="logun_btn" class="btn btn-primary">Logout</button>
                </form>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="user_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="user_profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                My Profile
                            </a>
                            <a class="nav-link" href="announcements.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-bullhorn"></i></div>
                                Announcements
                            </a>
                            <a class="nav-link" href="tutorials.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book-reader"></i></div>
                                Tutorials
                            </a>
                            <a class="nav-link" href="documents.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book"></i></div>
                                Documents
                            </a>
                            <a class="nav-link" href="find_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-search"></i></div>
                                Find User
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
<?php
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE email='$email'";
        $query_run = mysqli_query($connection, $query);
        $admin = mysqli_fetch_assoc($query_run);
    }
?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="admin_dashboard.php"><?php echo $admin['username']; ?></a>
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
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="admin_profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profile
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <?php
                                if(isset($_SESSION['email'])){
                                    $email = $_SESSION['email'];
                                    $query = "SELECT * FROM users WHERE email='$email'";
                                    $query_run = mysqli_query($connection, $query);
                                    $admin = mysqli_fetch_assoc($query_run);
                                }

                                if($admin['sector'] == 'manage_admin'){
                                    echo '
                                        <a class="nav-link" href="manage_admins.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user-plus"></i></div>
                                            Manage Admins
                                        </a>
                                    ';
                                }
                                elseif($admin['sector'] == 'approve_user'){
                                    echo '
                                        <a class="nav-link" href="manage_users.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-users"></i></div>
                                            Manage Users
                                        </a>
                                        <a class="nav-link" href="pending_requests.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa fa-user-plus"></i></div>
                                            Pending Requests
                                        </a>
                                    ';
                                }
                                elseif($admin['sector'] == 'manage_announcement'){
                                    echo '
                                        <a class="nav-link" href="manage_announcements.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-edit"></i></div>
                                            Announcements
                                        </a>
                                    ';
                                }
                                elseif($admin['sector'] == 'manage_documents_tutorial'){
                                    echo '
                                        <a class="nav-link" href="manage_documents.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-edit"></i></div>
                                            Documents
                                        </a>
                                        <a class="nav-link" href="manage_tutorials.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-edit"></i></div>
                                            Tutorials
                                        </a>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
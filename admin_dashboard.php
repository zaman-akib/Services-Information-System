<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
        </div>
    </main>
    </div>

    <!-- Content Row -->
    <div class="row">
    <?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = "SELECT * FROM users WHERE email='$email'";
            $query_run = mysqli_query($connection, $query);
            $admin = mysqli_fetch_assoc($query_run);
        }

        if($admin['sector'] == 'manage_admin'){ 
        ?>
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-dark shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-center text-light text-uppercase mb-1">Total Registered Admin</div>
                    <div class="mb-0 font-weight-bold text-center text-light">
                    <?php
                        $query = "SELECT * FROM users WHERE role = 'admin'";
                        $query_run = mysqli_query($connection, $query);
                    ?>

                    <h1><?php echo mysqli_num_rows($query_run) ?></h1>

                    </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-light"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        <?php }
        elseif($admin['sector'] == 'approve_user'){
        ?>
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-dark shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-center text-light text-uppercase mb-1">Total Registered Users</div>
                    <div class="mb-0 font-weight-bold text-center text-light">

                    <?php
                        $query = "SELECT * FROM users WHERE role = 'user'";
                        $query_run = mysqli_query($connection, $query);
                    ?>

                    <h1><?php echo mysqli_num_rows($query_run) ?></h1>

                    </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-user fa-2x text-light"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-dark shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-center text-warning text-light text-uppercase mb-1">Pending Requests</div>
                    <div class="mb-0 font-weight-bold text-center text-light">
                    <?php
                        $query = "SELECT * FROM pending_requests";
                        $query_run = mysqli_query($connection, $query);
                    ?>

                    <h1><?php echo mysqli_num_rows($query_run) ?></h1>
                    </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-light"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        <?php }
        elseif($admin['sector'] == 'manage_announcement'){ 
        ?>
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-dark shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-center text-light text-uppercase mb-1">Total Announcements</div>
                    <div class="mb-0 font-weight-bold text-center text-light">

                    <?php
                        $query = "SELECT * FROM announcements";
                        $query_run = mysqli_query($connection, $query);
                    ?>

                    <h1><?php echo mysqli_num_rows($query_run) ?></h1>

                    </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-bullhorn fa-2x text-light"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        <?php }
        elseif($admin['sector'] == 'manage_documents_tutorial'){ 
        ?>
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-dark shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-center text-light text-uppercase mb-1">Total Documents
                    </div>
                    <div class="mb-0 font-weight-bold text-center text-light">

                    <?php
                        $query = "SELECT * FROM documents";
                        $query_run = mysqli_query($connection, $query);
                    ?>

                    <h1><?php echo mysqli_num_rows($query_run) ?></h1>

                    </div>

                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-dark shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-center text-light text-uppercase mb-1">Total Tutorials
                    </div>
                    <div class="mb-0 font-weight-bold text-center text-light">

                    <?php
                        $query = "SELECT * FROM tutorials";
                        $query_run = mysqli_query($connection, $query);
                    ?>

                    <h1><?php echo mysqli_num_rows($query_run) ?></h1>

                    </div>

                    </div>
                </div>
                </div>
            </div>
            </div>
        <?php } ?>
    
</div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
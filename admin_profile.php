<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">My Profile</h1>
        </div>
    </main>
    <a class="nav-link" href="change_pass_admin.php">
        <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
        Change Password
    </a>
    </div>


    <?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = "SELECT * FROM users WHERE email='$email'";
            $query_run = mysqli_query($connection, $query);
            $admin = mysqli_fetch_assoc($query_run);
        }
    ?>

    <div class="table-responsive">
        <div>
        <?php
          if(isset($_SESSION['update_pass_status']) && $_SESSION['update_pass_status']!=''){ ?>
            <div class="alert alert-success">
            <?php echo '<h4> '.$_SESSION['update_pass_status'].'</h4>'; ?>
            </div>
            <?php unset($_SESSION['update_pass_status']);
          }
        ?>
    </div>
        <table class="table table-bordered table-light table-striped" id="userCourseTable" width="50%" cellspacing="0">
        <tr>
            <th scope="col">Username </th>
            <td> <?php echo $admin['username']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Email </th>
            <td> <?php echo $admin['email']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Role </th>
            <td> <?php echo $admin['role']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Sector </th>
            <td> <?php echo $admin['sector']; ?> </td>
        </tr>
        </table>
    </div>
    


</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
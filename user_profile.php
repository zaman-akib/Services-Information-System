<?php
include('security.php');
include('includes/user_header.php');
include('includes/user_navbar.php');
?>

<div class="container-fluid bg-primary">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">My Profile</h1>
        </div>
    </main>
    <a class="nav-link" href="edit_profile.php">
        <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
        Edit Profile
    </a>
    </div>

    <?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = "SELECT * FROM users WHERE email='$email'";
            $query_run = mysqli_query($connection, $query);
            $user = mysqli_fetch_assoc($query_run);
        }
    ?>

    <div class="table-responsive">
        <div> 
        <?php
          if(isset($_SESSION['update_user_status']) && $_SESSION['update_user_status']!=''){ ?>
            <div class="alert alert-success">
            <?php echo '<h4> '.$_SESSION['update_user_status'].'</h4>'; ?>
            </div>
            <?php unset($_SESSION['update_user_status']);
          }
          if(isset($_SESSION['update_pass_status']) && $_SESSION['update_pass_status']!=''){ ?>
            <div class="alert alert-success">
            <?php echo '<h4> '.$_SESSION['update_pass_status'].'</h4>'; ?>
            </div>
            <?php unset($_SESSION['update_pass_status']);
          }
        ?>
        </div>
        
        <table class="table table-bordered table-primary table-striped" id="userCourseTable" width="50%" cellspacing="0">
        <tr>
        <th scope="col">BA Number </th>
        <td> <?php echo $user['ba_no']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Name </th>
            <td> <?php echo $user['username']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Email </th>
            <td> <?php echo $user['email']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Sector </th>
            <td> <?php echo $user['sector']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Rank </th>
            <td> <?php echo $user['rank']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Corps </th>
            <td> <?php echo $user['corps']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Unit </th>
            <td> <?php echo $user['unit']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Appointment </th>
            <td> <?php echo $user['appointment'];?> </td>
        </tr>
        <tr>
            <th scope="col">Contact </th>
            <td> <?php echo $user['contact']; ?> </td>
        </tr>
        <tr>
            <th scope="col">Address </th>
            <td> <?php echo $user['address']; ?> </td>
        </tr>
        </table>
    </div>
    
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
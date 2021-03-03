<?php
include('security.php');
include('includes/user_header.php'); 
include('includes/user_navbar.php'); 
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Profile</h1>
        </div>
    </main>

    <a class="nav-link" href="change_password.php">
        <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
        Change Password
    </a>
    </div>
    <div>
        <?php
            $email = $_SESSION['email'];
            $query = "SELECT * FROM users WHERE email='$email' ";
            $query_run = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($query_run);
            ?>

            <form action="code.php" method="POST">
                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                            placeholder="Enter Username">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Sector</label>
                        <input type="int" name="edit_sector" value="<?php echo $row['sector'] ?>"
                            class="form-control" placeholder="Enter Sector">
                    </div>
                    <div class="form-group">
                        <label> Rank </label>
                        <input type="text" name="edit_rank" value="<?php echo $row['rank'] ?>" class="form-control"
                            placeholder="Enter Rank">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label> Corps </label>
                        <input type="text" name="edit_corps" value="<?php echo $row['corps'] ?>" class="form-control"
                            placeholder="Enter Corps">
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" name="edit_unit" value="<?php echo $row['unit'] ?>"
                            class="form-control" placeholder="Enter Unit">
                    </div>
                    <div class="form-group">
                        <label>Appointment</label>
                        <input type="text" name="edit_appointment" value="<?php echo $row['appointment'] ?>"
                            class="form-control" placeholder="Enter Appointment">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="int" name="edit_contact" value="<?php echo $row['contact'] ?>"
                            class="form-control" placeholder="Enter Contact">
                    </div>
                    <div class="form-group">
                        <label> Address </label>
                        <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control"
                            placeholder="Enter Address">
                    </div>
                </div>

                <a href="user_profile.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="update_user_btn" class="btn btn-primary"> Update </button>

            </form>
        </div>

</div>


<?php
include('includes/scripts.php');
?>
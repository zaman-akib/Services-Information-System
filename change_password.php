<?php
include('security.php');
include('includes/user_header.php'); 
include('includes/user_navbar.php'); 
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Change Password</h1>
        </div>
    </main>
    </div>
    <div>
        <form action="code.php" method="POST">
                <div class="form-group">
                    <label> Old Password </label>
                    <input type="text" name="old_pass" class="form-control" placeholder="Enter Old Password" required/>
                </div>
                <div class="form-group">
                    <label> New Password </label>
                    <input type="text" name="new_pass" class="form-control" placeholder="Enter New Password" required/>
                </div>
            </div>

            <a href="user_profile.php" class="btn btn-danger"> Cancel </a>
            <button type="submit" name="update_pass_btn" class="btn btn-primary"> Update </button>

        </form>
    </div>

</div>


<?php
include('includes/scripts.php');
?>
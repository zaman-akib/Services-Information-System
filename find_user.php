<?php
include('security.php');
include('includes/user_header.php');
include('includes/user_navbar.php');
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Find User</h1>
        </div>
    </main>
    </div>

    <form action="find_user.php" method="post"> 
      <input type="text" name="search_ba_no" placeholder="Enter BA/P/BD No. or Name" size="30" required /> 
      <input type="submit" value="Search" name="search_btn" />
    </form>
    <br>

    <?php
        if(isset($_POST['search_ba_no'])){
            $ba_no = $_POST['search_ba_no'];
            $query = "SELECT * FROM users WHERE ba_no='$ba_no' OR username='$ba_no'";
            $query_run = mysqli_query($connection, $query);
            if(mysqli_num_rows($query_run) > 0){
                $user = mysqli_fetch_assoc($query_run); ?>
                <div class="table-responsive">
                <table class="table table-bordered table-light table-striped" id="userCourseTable" width="50%" cellspacing="0">
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
            <?php
            }
            else{
                echo "<h4>No User Found!!</h4?";
            }
        }
    ?>
    
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
?>
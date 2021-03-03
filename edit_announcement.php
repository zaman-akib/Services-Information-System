<?php
include('security.php');
include('includes/user_header.php'); 
include('includes/user_navbar.php'); 
?>

<div class="container-fluid">
    <main>
        <div class="container-fluid">
            <h2 class="mt-4">Edit Announcement</h2>
        </div>
    </main>

    <div class="card shadow mb-4">
        <div class="card-body">
        <?php
            if(isset($_POST['edit_announce_btn']))
            {
                $id = $_POST['edit_announce_id'];
                
                $query = "SELECT * FROM announcements WHERE announcement_id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="edit_announce_id" value="<?php echo $row['announcement_id'] ?>">
                            <div class="form-group">
                            <label class="small mb-1" for="edit_sector">Announcement Catergory</label>
                                <select class="form-control" name="edit_sector">
                                    <option>Army</option>
                                    <option>Navy</option>
                                    <option>Air Force</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="edit_title">Announcement Title</label>
                                <input type="text" name="edit_title" value="<?php echo $row['announcement_title'] ?>" class="form-control" placeholder="Enter Announcement Title">
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="edit_attachment">Details</label>
                                <input type="text" name="edit_attachment" value="<?php echo $row['details'] ?>" class="form-control" placeholder="Enter Details">
                            </div>
                            <div class="form-group">
                              <label>Upload Announcement</label>
                              <input type="file" name="file" class="form-control" required/>
                            </div>

                            <a href="manage_announcements.php" class="btn btn-danger"> Cancel </a>
                            <button type="submit" name="update_announcement_btn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
?>
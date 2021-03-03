<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#announcementTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
            <label class="small mb-1" for="sector">Announcement Catergory</label>
                <select class="form-control" name="sector">
                    <option>Army</option>
                    <option>Navy</option>
                    <option>Air Force</option>
                    <option>For All</option>
                </select>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="title">Announcement Title</label>
                <input class="form-control py-4" id="title" name="title" type="text" placeholder="Enter announcement title" required/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="details">Details</label>
                <input class="form-control py-4" id="attachment" name="attachment" type="text" placeholder="Enter details" required/>
            </div>
            <div class="form-group">
              <label>Upload Announcement</label>
              <input type="file" name="file" class="form-control" required/>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_announcement_btn" class="btn btn-primary">Add Announcement</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
      <div class="container-fluid">
          <h1 class="mt-4">Announcements</h1>
      </div>
    </main>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
      Add New Announcement
    </button>
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-body">
      <?php
        if(isset($_SESSION['announce_status']) && $_SESSION['announce_status']!=''){ ?>
          <div class="alert alert-success">
          <?php echo '<h4> '.$_SESSION['announce_status'].'</h4>'; ?>
          </div>
          <?php unset($_SESSION['announce_status']);
        }
        if(isset($_SESSION['update_announce_status']) && $_SESSION['update_announce_status']!=''){ ?>
          <div class="alert alert-success">
          <?php echo '<h4> '.$_SESSION['update_announce_status'].'</h4>'; ?>
          </div>
          <?php unset($_SESSION['update_announce_status']);
        }
        if(isset($_SESSION['delete_announcement_status']) && $_SESSION['delete_announcement_status']!=''){ ?>
          <div class="alert alert-success">
          <?php echo '<h4> '.$_SESSION['delete_announcement_status'].'</h4>'; ?>
          </div>
          <?php unset($_SESSION['delete_announcement_status']);
        }
      ?>

    <div>
      <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
      <br><br>
    </div>

    <div class="table-responsive">
      <?php
          $query = "SELECT * FROM announcements";
          $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Announcement ID</th>
            <th>From</th>
            <th>To</th>
            <th>Date & Time</th>
            <th>Announcement Title</th>
            <th>Details</th>
            <th> View </th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="announcementTable">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
                  <td><?php  echo $row['announcement_id']; ?></td>
                  <td>HQ</td>
                  <td><?php  echo $row['sector']; ?></td>
                  <td><?php  echo $row['time']; ?></td>
                  <td><?php  echo $row['announcement_title']; ?></td>
                  <td><?php  echo $row['details']; ?></td>
                  <td>
                      <form action="view_doc.php" method="post" target="_blank">
                          <input type="hidden" name="view_doc_id" value="<?php echo $row['announcement_id']; ?>">
                          <button type="submit" name="view_ann_btn" class="btn btn-primary"> Open</button>
                      </form>
                  </td>
                  <td>
                      <form action="edit_announcement.php" method="post">
                          <input type="hidden" name="edit_announce_id" value="<?php echo $row['announcement_id']; ?>">
                          <button type="submit" name="edit_announce_btn" class="btn btn-success"> EDIT</button>
                      </form>
                  </td>
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="delete_announcement_id" value="<?php echo $row['announcement_id']; ?>">
                          <button type="submit" name="delete_announcement_btn" class="btn btn-danger"> DELETE</button>
                      </form>
                  </td>
              </tr>
          <?php
              } 
          }
          else {
              echo "<h4>No Record Found</h4?";
          }
          ?>
      </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
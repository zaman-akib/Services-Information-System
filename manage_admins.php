<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#adminTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
            <label>Select Admin Sector</label>
                <select class="form-control" name="sector">
                    <option>manage_admin</option>
                    <option>approve_user</option>
                    <option>manage_announcement</option>
                    <option>manage_documents_tutorial</option>
                </select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_admin_btn" class="btn btn-primary">Add Admin</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
      <div class="container-fluid">
          <h1 class="mt-4">Manage Admins</h1>
      </div>
    </main>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
      Add New Admin
    </button>
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-body">

      <?php
        if(isset($_SESSION['add_admin_status']) && $_SESSION['add_admin_status']!=''){ ?>
          <div class="alert alert-success">
          <?php echo '<h4> '.$_SESSION['add_admin_status'].'</h4>'; ?>
          </div>
          <?php unset($_SESSION['add_admin_status']);
        }
        if(isset($_SESSION['remove_admin_status']) && $_SESSION['remove_admin_status']!=''){ ?>
          <div class="alert alert-success">
          <?php echo '<h4> '.$_SESSION['remove_admin_status'].'</h4>'; ?>
          </div>
          <?php unset($_SESSION['remove_admin_status']);
        }
      ?>

    <div>
      <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
      <br><br>
    </div>

    <div class="table-responsive">
      <?php
          $role = "admin";
          $query = "SELECT * FROM users WHERE role = '$role'";
          $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Admin ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Role</th>
            <th>Sector</th>
            <!--<th>EDIT</th>-->
            <th>REMOVE</th>
          </tr>
        </thead>
        <tbody id="adminTable">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
                  <td><?php  echo $row['user_id']; ?></td>
                  <td><?php  echo $row['username']; ?></td>
                  <td><?php  echo $row['email']; ?></td>
                  <td><?php  echo $row['role']; ?></td>
                  <td><?php  echo $row['sector']; ?></td>
                  <!--<td>
                      <form action="#" method="post">
                          <input type="hidden" name="edit_id" value="<?php echo $row['admin_id']; ?>">
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                      </form>
                  </td>-->
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="remove_admin_id" value="<?php echo $row['user_id']; ?>">
                          <button type="submit" name="remove_admin_btn" class="btn btn-danger"> Remove</button>
                      </form>
                  </td>
              </tr>
          <?php
              } 
          }
          else {
              echo "No Record Found";
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
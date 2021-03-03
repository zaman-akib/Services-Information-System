<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usersTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <div class="form-row">
            <div class="col-md-6">
            <div class="form-group">
                <label class="small mb-1" for="ba_no">BA/P/BD Number</label>
                <input class="form-control py-4" id="ba_no" name="ba_no" type="text" placeholder="Enter BA/P/BD number" required/>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="small mb-1" for="username">Username</label>
                <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter username" required/>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label class="small mb-1" for="email">Email</label>
            <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required/>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="password">Password</label>
                    <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="confirmpassword">Confirm Password</label>
                    <input class="form-control py-4" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" required/>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="small mb-1" for="sector">Select sector</label>
                <select class="form-control" name="sector">
                    <option>Army</option>
                    <option>Navy</option>
                    <option>Air Force</option>
                </select>
            </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="rank">Rank</label>
                    <input class="form-control py-4" id="rank" name="rank" type="text" placeholder="Enter rank" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="corps">Corps</label>
                    <input class="form-control py-4" id="corps" name="corps" type="text" placeholder="Enter corps" required/>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="unit">Unit</label>
                    <input class="form-control py-4" id="unit" name="unit" type="text" placeholder="Enter unit" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="appointment">Appointment</label>
                    <input class="form-control py-4" id="appointment" name="appointment" type="text" placeholder="Enter appointment" required/>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="contact">Contact Number</label>
                    <input class="form-control py-4" id="contact" name="contact" type="text" placeholder="Enter contact number" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="address">Address</label>
                    <input class="form-control py-4" id="address" name="address" type="address" placeholder="Enter address" required/>
                </div>
            </div>
        </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_user_btn" class="btn btn-primary">Add User</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
      <div class="container-fluid">
          <h1 class="mt-4">Manage Users</h1>
      </div>
    </main>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserprofile">
      Add New User
    </button>
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div>
  <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
  </div>

  <div class="card-body">

      <?php
        if(isset($_SESSION['add_user_status']) && $_SESSION['add_user_status_code']!=''){ ?>
          <div class="alert alert-success">
          <?php echo '<h4> '.$_SESSION['add_user_status'].'</h4>'; ?>
          </div>
          <?php unset($_SESSION['add_user_status']);
        }
        if(isset($_SESSION['remove_user_status']) && $_SESSION['remove_user_status']!=''){ ?>
          <div class="alert alert-success">
            <?php echo '<h4> '.$_SESSION['remove_user_status'].'</h4>'; ?>
          </div>
            <?php unset($_SESSION['remove_user_status']);
        }
      ?>
    </div>

<div class="table-responsive">
      <?php
          $query = "SELECT * FROM users WHERE role='user'";
          $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> User ID </th>
            <th> BA Number </th>
            <th> Username </th>
            <th>Email </th>
            <th>Sector</th>
            <th>Rank</th>
            <th>Corps</th>
            <th>Unit</th>
            <th>Appointemnt</th>
            <th>Contact</th>
            <th>Address</th>
            <!--<th>EDIT</th>-->
            <th>REMOVE</th>
          </tr>
        </thead>
        <tbody id="usersTable">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
                <td><?php  echo $row['user_id']; ?></td>
                <td><?php  echo $row['ba_no']; ?></td>
                <td><?php  echo $row['username']; ?></td>
                <td><?php  echo $row['email']; ?></td>
                <td><?php  echo $row['sector']; ?></td>
                <td><?php  echo $row['rank']; ?></td>
                <td><?php  echo $row['corps']; ?></td>
                <td><?php  echo $row['unit']; ?></td>
                <td><?php  echo $row['appointment']; ?></td>
                <td><?php  echo $row['contact']; ?></td>
                <td><?php  echo $row['address']; ?></td>
                  <!--<td>
                      <form action="#" method="post">
                          <input type="hidden" name="edit_user_id" value="<?php echo $row['user_id']; ?>">
                          <button type="submit" name="edit_user_btn" class="btn btn-success"> EDIT</button>
                      </form>
                  </td>-->
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="remove_user_id" value="<?php echo $row['user_id']; ?>">
                          <button type="submit" name="remove_user_btn" class="btn btn-danger">REMOVE</button>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
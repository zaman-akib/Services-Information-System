<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#request_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Pending Requests</h1>
        </div>
    </main>
    </div>

    <div>
    	<?php
	      if(isset($_SESSION['approve_status']) && $_SESSION['approve_status']!=''){ ?>
          <div class="alert alert-success">
	        <?php echo '<h4> '.$_SESSION['approve_status'].'</h4>'; ?>
          </div>
	        <?php unset($_SESSION['approve_status']);
	      }
	      elseif(isset($_SESSION['decline_status']) && $_SESSION['decline_status']!=''){ ?>
          <div class="alert alert-success">
	        <?php echo '<h4> '.$_SESSION['decline_status'].'</h4>'; ?>
          </div>
	        <?php unset($_SESSION['decline_status']);
	      }
    	?>
    </div>

    <div>
      <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
      <br><br>
    </div>
    
    <div class="table-responsive">
      <?php
          $query = "SELECT * FROM pending_requests";
          $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Request ID </th>
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
            <th>APPROVE</th>
            <th>DECLINE</th>
          </tr>
        </thead>
        <tbody id="request_table">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
                  <td><?php  echo $row['req_id']; ?></td>
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
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="approve_id" value="<?php echo $row['req_id']; ?>">
                          <button type="submit" name="approve_btn" class="btn btn-success">APPROVE</button>
                      </form>
                  </td>
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="decline_id" value="<?php echo $row['req_id']; ?>">
                          <button type="submit" name="decline_btn" class="btn btn-danger">DECLINE</button>
                      </form>
                  </td>
              </tr>
          <?php
              } 
          }
          else {
              echo "<h3> No Pending Request Found </h3?";
          }
          ?>
      </tbody>
      </table>

    </div>


</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
<?php
include('security.php');
include('includes/user_header.php'); 
include('includes/user_navbar.php'); 
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#announcement_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
      <div class="container-fluid">
          <h1 class="mt-4">Announcements</h1>
      </div>
    </main>
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-body">

    <?php
      if(isset($_SESSION['announce_status']) && $_SESSION['announce_status']!=''){
        echo '<h4> '.$_SESSION['announce_status'].'</h4>';
        unset($_SESSION['announce_status']);
      }
    ?>

    <div>
      <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
      <br><br>
    </div>

    <div class="table-responsive">
      <?php
        $email = $_SESSION['email'];
        $q = "SELECT * FROM users WHERE email='$email'";
        $q_run = mysqli_query($connection, $q);
        $temp = mysqli_fetch_assoc($q_run);
        $sector = $temp['sector'];

        $query = "SELECT * FROM announcements WHERE sector='$sector' OR sector='For All'";
        $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>From</th>
            <th>To</th>
            <th>Date & Time</th>
            <th>Announcement Title</th>
            <th>Details</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody id="announcement_table">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
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
<?php
include('security.php');
include('includes/user_header.php'); 
include('includes/user_navbar.php'); 
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tutorialTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tutorials</h1>
        </div>
    </main>
    </div>
    
    <div class="row">
    	<?php
    	if(isset($_POST['view_tutorial_btn'])){
    	  $id = $_POST['view_tutorial_id'];
          $q = "SELECT * FROM tutorials WHERE tutorial_id = '$id'";
          $qr = mysqli_query($connection, $q);
          $video=mysqli_fetch_array($qr)
          ?>
    		<div class="col-md-4">
    			<video width="100%" controls src="<?php echo $video['location']; ?>">
    			</video>
    			<span><?php echo $video['title']; ?></span>
    		</div>
    	<?php } ?>
    </div>
    
</div>
<!-- /.container-fluid -->
<br>

<div class="card shadow mb-4">

  <div class="card-body">
    <div>
      <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
      <br>
    </div>
    <br>

    <div class="table-responsive">
      <?php
        $email = $_SESSION['email'];
        $q = "SELECT * FROM users WHERE email='$email'";
        $q_run = mysqli_query($connection, $q);
        $temp = mysqli_fetch_assoc($q_run);
        $sector = $temp['sector'];

        $query = "SELECT * FROM tutorials WHERE sector='$sector' OR sector='For All'";
        $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Sector </th>
            <th> Title </th>
            <th> View </th>
          </tr>
        </thead>
        <tbody id="tutorialTable">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
                  <td><?php  echo $row['sector']; ?></td>
                  <td><?php  echo $row['title']; ?></td>
                  <td>
                      <form action="tutorials.php" method="post">
                          <input type="hidden" name="view_tutorial_id" value="<?php echo $row['tutorial_id']; ?>">
                          <button type="submit" name="view_tutorial_btn" class="btn btn-success"> Play </button>
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


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
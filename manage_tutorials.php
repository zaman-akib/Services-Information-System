<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
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
            <h1 class="mt-4">Manage Tutorials</h1>
        </div>
    </main>
    </div>

    <div class="col-lg-8">
    	<form action="code.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="sector"><strong>Announcement Catergory</strong></label>
              <select class="form-control" name="sector">
                  <option>Army</option>
                  <option>Navy</option>
                  <option>Air Force</option>
                  <option>For All</option>
              </select>
          </div>
        </div>
        <div class="col-md-6">
    		<div class="form-group">
    			<label><strong>Upload a New Tutorial: </strong></label>
    			<input type="file" name="file" class="form-control" required>
    		</div>
      </div>
    </div>
    		<input type="submit" name="upload_tutorial_btn" value="Upload" class="btn btn-success ml-3">
    	</form>
    </div>

    <br>
    <?php
          if(isset($_SESSION['upload_tutorial_status']) && $_SESSION['upload_tutorial_status']!=''){ ?>
            <div class="alert alert-success">
            <?php echo '<h4> '.$_SESSION['upload_tutorial_status'].'</h4>'; ?>
            </div>
            <?php
            unset($_SESSION['upload_tutorial_status']);
          }
        ?>

    <div class="row align-items-center">
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
      <?php
        if(isset($_SESSION['remove_doc_status']) && $_SESSION['remove_doc_status']!=''){ ?>
        <div class="alert alert-danger">
          <?php echo '<h4> '.$_SESSION['remove_doc_status'].'</h4>'; ?>
      	</div>
          <?php unset($_SESSION['remove_doc_status']);
        }
      ?>
      <?php
        if(isset($_SESSION['view_doc_status']) && $_SESSION['view_doc_status']!=''){ ?>
        <div class="alert alert-danger">
          <?php echo '<h4> '.$_SESSION['view_doc_status'].'</h4>'; ?>
      	</div>
          <?php unset($_SESSION['view_doc_status']);
        }
      ?>

    <div>
      <b>Search:</b> <input id="myInput" type="text" placeholder="Enter Keyword..">
      <br>
    </div>
    <br>

    <div class="table-responsive">
      <?php
          $query = "SELECT * FROM tutorials";
          $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th> Turoual ID</th>
            <th> Sector </th>
            <th> Title </th>
            <th> View </th>
            <th> Remove </th>
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
              	  <td><?php  echo $row['tutorial_id']; ?></td>
                  <td><?php  echo $row['sector']; ?></td>
                  <td><?php  echo $row['title']; ?></td>
                  <td>
                      <form action="manage_tutorials.php" method="post">
                          <input type="hidden" name="view_tutorial_id" value="<?php echo $row['tutorial_id']; ?>">
                          <button type="submit" name="view_tutorial_btn" class="btn btn-success"> Play </button>
                      </form>
                  </td>
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="remove_tutorial_id" value="<?php echo $row['tutorial_id']; ?>">
                          <button type="submit" name="remove_tutorial_btn" class="btn btn-danger"> Remove</button>
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
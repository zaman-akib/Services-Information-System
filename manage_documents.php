<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#docTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Manage Documents</h1>
        </div>
    </main>
    </div>
    
</div>

<div class="col-lg-8">
    	<form action="code.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="sector"> <strong>Document Catergory</strong></label>
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
    			<label><strong>Upload a New Document: </strong></label>
    			<input type="file" name="file" class="form-control" required>
    		</div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <input type="submit" name="upload_document_btn" value="Upload" class="btn btn-success ml-3">
      </div>
      </div>

      </div>
        
      </form>
</div>

    <br>

    <?php
          if(isset($_SESSION['upload_document_status']) && $_SESSION['upload_document_status']!=''){ ?>
            <div class="alert alert-success">
            <?php echo '<h4> '.$_SESSION['upload_document_status'].'</h4>'; ?>
            </div>
            <?php
            unset($_SESSION['upload_document_status']);
          }
        ?>
<!-- /.container-fluid -->
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
          $query = "SELECT * FROM documents";
          $query_run = mysqli_query($connection, $query);
      ?>
      <table class="table table-bordered table-dark table-striped" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Doc ID </th>
            <th> Sector </th>
            <th> Title </th>
            <th> View </th>
            <th> Remove </th>
          </tr>
        </thead>
        <tbody id="docTable">
          <?php
          if(mysqli_num_rows($query_run) > 0)        
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
          ?>
              <tr>
                  <td><?php  echo $row['id']; ?></td>
                  <td><?php  echo $row['sector']; ?></td>
                  <td><?php  echo $row['title']; ?></td>
                  <td>
                      <form action="view_doc.php" method="post" target="_blank">
                          <input type="hidden" name="view_doc_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="view_doc_btn" class="btn btn-primary"> Open</button>
                      </form>
                  </td>
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="remove_doc_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="remove_doc_btn" class="btn btn-danger"> Remove</button>
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
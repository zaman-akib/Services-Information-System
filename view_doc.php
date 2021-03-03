<?php
include('security.php');

if(isset($_POST['view_doc_btn'])){
    $id = $_POST['view_doc_id'];

    $query = "SELECT * FROM documents WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    $doc = mysqli_fetch_assoc($query_run);
    
    if($query_run) {
        $filename = $doc['location'];

        header("Content-type: application/pdf"); 
          
        header("Content-Length: " . filesize($filename)); 

        readfile($filename);
    }
    else {
        $_SESSION['view_doc_status'] = "Something went wrong!! Cannot open the document!!";
        $_SESSION['view_doc_status_code'] = "error";
        header('Location: manage_documents.php');
    }
}

elseif(isset($_POST['view_ann_btn'])){
    $id = $_POST['view_doc_id'];

    $query = "SELECT * FROM announcements WHERE announcement_id='$id'";
    $query_run = mysqli_query($connection, $query);
    $doc = mysqli_fetch_assoc($query_run);
    
    if($query_run) {
        $filename = $doc['location'];

        header("Content-type: application/pdf"); 
          
        header("Content-Length: " . filesize($filename)); 

        readfile($filename);
    }
    else {
        $_SESSION['view_doc_status'] = "Something went wrong!! Cannot open the document!!";
        $_SESSION['view_doc_status_code'] = "error";
        header('Location: manage_documents.php');
    }
}

?>
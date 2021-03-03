<?php
include('security.php');

if(isset($_POST['add_admin_btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $sector = $_POST['sector'];

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0){
        $_SESSION['add_admin_status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['add_admin_status_code'] = "error";
        header('Location: manage_admins.php');  
    }
    else{
        if($password === $cpassword) {
            $query = "INSERT INTO users (username,email,password,role,sector) VALUES ('$username','$email',PASSWORD($password),'admin', '$sector')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run) {
                $_SESSION['add_admin_status'] = "New Admin Added Successfully";
                $_SESSION['add_admin_status_code'] = "success";
                header('Location: manage_admins.php');
            }
            else {
                $_SESSION['add_admin_status'] = "Failed !! Admin Not Added. Please Try Again";
                $_SESSION['add_admin_status_code'] = "error";
                header('Location: manage_admins.php'); 
            }
        }
        else 
        {
            $_SESSION['add_admin_status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['add_admin_status_code'] = "warning";
            header('Location: manage_admins.php'); 
        }
    }

}

elseif(isset($_POST['add_user_btn'])){
    $ba_no = $_POST['ba_no'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $sector = $_POST['sector'];
    $rank = $_POST['rank'];
    $corps = $_POST['corps'];
    $unit = $_POST['unit'];
    $appointment = $_POST['appointment'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0){
        $_SESSION['add_user_status'] = "This Email is Already Registered!!";
        $_SESSION['add_user_status_code'] = "error";
        header('Location: manage_users.php');
    }
    else{
        if($password === $cpassword) {
            $query = "INSERT INTO users (ba_no,username,email,password, role, sector, rank, corps, unit, appointment, contact, address) VALUES ('$ba_no','$username', '$email', PASSWORD($password), 'user', '$sector', '$rank', '$corps', '$unit', '$appointment', '$contact', '$address')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run) {
                // echo "Saved";
                $_SESSION['add_user_status'] = "New User Added Successfully";
                $_SESSION['add_user_status_code'] = "success";
                header('Location: manage_users.php');
            }
            else {
                $_SESSION['add_user_status'] = "Failed !! Please Try Again";
                $_SESSION['add_user_status_code'] = "error";
                header('Location: manage_users.php'); 
            }
        }
        else 
        {
            $_SESSION['add_user_status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['add_user_status_code'] = "warning";
            header('Location: manage_users.php'); 
        }
    }

}

elseif(isset($_POST['signupbtn'])){
    $ba_no = $_POST['ba_no'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $sector = $_POST['sector'];
    $rank = $_POST['rank'];
    $corps = $_POST['corps'];
    $unit = $_POST['unit'];
    $appointment = $_POST['appointment'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $email_query_run = mysqli_query($connection, $email_query);
    $email_query2 = "SELECT * FROM pending_requests WHERE email='$email'";
    $email_query_run2 = mysqli_query($connection, $email_query2);
    if(mysqli_num_rows($email_query_run) > 0 || mysqli_num_rows($email_query_run2) > 0)
    {
        $_SESSION['signup_status'] = "This Email is Already Registered!!";
        $_SESSION['signup_status_code'] = "error";
        header('Location: signup.php');
    }
    else
    {
        if($password === $cpassword) {
            $query = "INSERT INTO pending_requests (ba_no, username, email, password, role, sector, rank, corps, unit, appointment, contact, address) VALUES ('$ba_no','$username','$email', $password, 'user', '$sector', '$rank', '$corps', '$unit', '$appointment', '$contact', '$address')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run) {
                // echo "Saved";
                $_SESSION['signup_status'] = "You Have Successfully Submitted Your Registration Form.";
                $_SESSION['signup_status_code'] = "success";
                header('Location: signup.php');
            }
            else {
                $_SESSION['signup_status'] = "Registration Failed !! Please Try Again";
                $_SESSION['signup_status_code'] = "error";
                header('Location: signup.php'); 
            }
        }
        else 
        {
            $_SESSION['signup_status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['signup_status_code'] = "warning";
            header('Location: signup.php'); 
        }
    }

}

elseif(isset($_POST['loginbtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_query = "SELECT email,password,role FROM users WHERE email='$email'";

    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) == 1){
        $user = mysqli_fetch_assoc($email_query_run);
        $pass_query = mysqli_query($connection, "SELECT PASSWORD($password) AS pass");
        $hashed = mysqli_fetch_assoc($pass_query);
        if($user['password'] == $hashed['pass']){
            $_SESSION['login_status'] = "Logged In";
            $_SESSION['login_status_code'] = "loggedin";
            $_SESSION['email'] = $email;
            if($user['role'] == "user"){
                header('Location: user_dashboard.php');
            }
            else{
                header('Location: admin_dashboard.php');
            }
        }
        else{
            $_SESSION['login_status'] = "Incorrect Password!!";
            $_SESSION['login_status_code'] = "incorrect_password";
            header('Location: login.php');
        }
    }
    else{
        $_SESSION['login_status'] = "User Does Not Exist!!";
        $_SESSION['login_status_code'] = "user_not_exist";
        header('Location: login.php');
    }

}

elseif(isset($_POST['add_announcement_btn'])){
    $sector = $_POST['sector'];
    $title = $_POST['title'];
    $details = $_POST['attachment'];

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_dest = "announcements/".$file_name;


    if(move_uploaded_file($temp_name, $file_dest)){
        $query = "INSERT INTO announcements (sector,announcement_title,details,location) VALUES ('$sector','$title','$details','$file_dest')";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run) {
            // echo "Saved";
            $_SESSION['announce_status'] = "New Announcement Added Successfully";
            $_SESSION['announce_status_code'] = "success";
            header('Location: manage_announcements.php');
        }
        else {
            $_SESSION['announce_status'] = "Something went wrong!!";
            $_SESSION['announce_status_code'] = "error";
            header('Location: manage_announcements.php'); 
        }
    }
    else {
        $_SESSION['announce_status'] = "File cannot be uploaded!!";
        $_SESSION['announce_status_code'] = "error";
        header('Location: manage_announcements.php'); 
    }
}

elseif(isset($_POST['approve_btn'])){
    $req_id = $_POST['approve_id'];

    $query = "SELECT * FROM pending_requests WHERE req_id='$req_id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $user = mysqli_fetch_assoc($query_run);
        $ba_no = $user['ba_no'];
        $username = $user['username'];
        $email = $user['email'];
        $password = $user['password'];
        $cpassword = $user['confirmpassword'];
        $sector = $user['sector'];
        $rank = $user['rank'];
        $corps = $user['corps'];
        $unit = $user['unit'];
        $appointment = $user['appointment'];
        $contact = $user['contact'];
        $address = $user['address'];
        $query2 = "INSERT INTO users (ba_no, username, email, password, role, sector, rank, corps, unit, appointment, contact, address) VALUES ('$ba_no', '$username','$email', PASSWORD($password), 'user', '$sector', '$rank', '$corps', '$unit', '$appointment', '$contact', '$address')";
        $query2_run = mysqli_query($connection, $query2);

        $query3 = "DELETE FROM pending_requests WHERE req_id='$req_id'";
        $query3_run = mysqli_query($connection, $query3);

        if($query2_run && $query3_run){
            $_SESSION['approve_status'] = "User Approved Successfully.";
            $_SESSION['approve_status_code'] = "success";
            header('Location: pending_requests.php');
        }
        else{
            $_SESSION['approve_status'] = "Something went wrong!!";
            $_SESSION['approve_status_code'] = "error";
            header('Location: pending_requests.php'); 
        }
    }
    else {
        $_SESSION['approve_status'] = "Something went wrong!!";
        $_SESSION['approve_status_code'] = "error";
        header('Location: pending_requests.php'); 
    }

}

elseif(isset($_POST['decline_btn'])){
    $req_id = $_POST['decline_id'];

    $query = "DELETE FROM pending_requests WHERE req_id='$req_id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['decline_status'] = "Request is Declined.";
        $_SESSION['decline_status_code'] = "declined";
        header('Location: pending_requests.php');
    }
    else {
        $_SESSION['decline_status'] = "Something went wrong!!";
        $_SESSION['decline_status_code'] = "error";
        header('Location: pending_requests.php'); 
    }

}

elseif(isset($_POST['remove_user_btn'])){
    $id = $_POST['remove_user_id'];

    $query = "DELETE FROM users WHERE user_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['remove_user_status'] = "User Removed Successfully.";
        $_SESSION['remove_user_status_code'] = "removed";
        header('Location: manage_users.php');
    }
    else {
        $_SESSION['remove_user_status'] = "Failed !! User Cannot be Removed. Please Check your internet connection.";
        $_SESSION['remove_user_status_code'] = "error";
        header('Location: manage_users.php');
    }

}

elseif(isset($_POST['remove_admin_btn'])){
    $id = $_POST['remove_admin_id'];

    $query = "DELETE FROM users WHERE user_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['remove_admin_status'] = "Admin Removed Successfully.";
        $_SESSION['remove_admin_status_code'] = "removed";
        header('Location: manage_admins.php');
    }
    else {
        $_SESSION['remove_admin_status'] = "Failed !! Admin Cannot be Removed. Please Check your internet connection.";
        $_SESSION['remove_admin_status_code'] = "error";
        header('Location: manage_admins.php');
    }

}

elseif(isset($_POST['update_announcement_btn'])){
    $id = $_POST['edit_announce_id'];
    $sector = $_POST['edit_sector'];
    $title = $_POST['edit_title'];
    $details = $_POST['edit_attachment'];

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_dest = "announcements/".$file_name;

    if(move_uploaded_file($temp_name, $file_dest)){
        $query = "UPDATE announcements SET sector='$sector', announcement_title='$title',  details='$details', location='$file_dest' WHERE announcement_id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['update_announce_status'] = "One Announcement is Updated";
            $_SESSION['update_announce_status_code'] = "success";
            header('Location: manage_announcements.php'); 
        }
        else
        {
            $_SESSION['update_announce_status'] = "Announcement is NOT Updated!! Try Again.";
            $_SESSION['update_announce_status_code'] = "error";
            header('Location: manage_announcements.php'); 
        }
    }
    else{
        $_SESSION['update_announce_status'] = "Something went wrong!!";
        $_SESSION['update_announce_status_code'] = "error";
        header('Location: manage_announcements.php'); 
    }
}

elseif(isset($_POST['delete_announcement_btn'])){
    $id = $_POST['delete_announcement_id'];

    $query = "DELETE FROM announcements WHERE announcement_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['delete_announcement_status'] = "Announcement Deleted Successfully.";
        $_SESSION['delete_announcement_status_code'] = "deleted";
        header('Location: manage_announcements.php');
    }
    else {
        $_SESSION['delete_announcement_status'] = "Failed !! Announcement Cannot be Deleted. Please Check your internet connection.";
        $_SESSION['delete_announcement_status_code'] = "error";
        header('Location: manage_announcements.php');
    }

}

elseif(isset($_POST['update_user_btn'])){
    $email = $_SESSION['email'];
    $username = $_POST['edit_username'];
    $sector = $_POST['edit_sector'];
    $rank = $_POST['edit_rank'];
    $corps = $_POST['edit_corps'];
    $unit = $_POST['edit_unit'];
    $appointment = $_POST['edit_appointment'];
    $address = $_POST['edit_address'];
    $contact = $_POST['edit_contact'];

    $query = "UPDATE users SET username='$username',  sector='$sector', rank='$rank', corps='$corps', unit='$unit', appointment='$appointment', address='$address', contact='$contact'  WHERE email='$email'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['update_user_status'] = "**Profile updated successfully";
        $_SESSION['update_user_status_code'] = "success";
        header('Location: user_profile.php'); 
    }
    else
    {
        $_SESSION['update_user_status'] = "Profile is NOT Updated!! Try Again.";
        $_SESSION['update_user_status_code'] = "error";
        header('Location: user_profile.php'); 
    }
}

elseif(isset($_POST['update_pass_btn'])){
    $email = $_SESSION['email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $query_run = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($query_run);

    if($query_run)
    {
        $pass_query = mysqli_query($connection, "SELECT PASSWORD($old_pass) AS pass");
        $hashed = mysqli_fetch_assoc($pass_query);
        if($user['password'] == $hashed['pass']){
            $q = "UPDATE users SET password=PASSWORD($new_pass) WHERE email='$email'";
            $qr = mysqli_query($connection, $q);
            $_SESSION['update_pass_status'] = "**Password updated successfully";
            $_SESSION['update_pass_status_code'] = "success";
            header('Location: user_profile.php');
        } 
        else{
            $_SESSION['update_pass_status'] = "**Incorrect old password !!!";
            $_SESSION['update_upass_status_code'] = "incorrect";
            header('Location: user_profile.php'); 
        }
    }
    else
    {
        $_SESSION['update_pass_status'] = "User Info is NOT Updated!! Try Again.";
        $_SESSION['update_upass_status_code'] = "error";
        header('Location: user_profile.php'); 
    }
}

elseif(isset($_POST['update_pass_admin_btn'])){
    $email = $_SESSION['email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $query_run = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($query_run);

    if($query_run)
    {
        $pass_query = mysqli_query($connection, "SELECT PASSWORD($old_pass) AS pass");
        $hashed = mysqli_fetch_assoc($pass_query);
        if($user['password'] == $hashed['pass']){
            $q = "UPDATE users SET password=PASSWORD($new_pass) WHERE email='$email'";
            $qr = mysqli_query($connection, $q);
            $_SESSION['update_pass_status'] = "**Password updated successfully";
            $_SESSION['update_pass_status_code'] = "success";
            header('Location: admin_profile.php');
        } 
        else{
            $_SESSION['update_pass_status'] = "**Incorrect old password !!!";
            $_SESSION['update_upass_status_code'] = "incorrect";
            header('Location: admin_profile.php'); 
        }
    }
    else
    {
        $_SESSION['update_pass_status'] = "User Info is NOT Updated!! Try Again.";
        $_SESSION['update_upass_status_code'] = "error";
        header('Location: admin_profile.php'); 
    }
}

elseif (isset($_POST['upload_tutorial_btn'])){
    $sector = $_POST['sector'];
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_dest = "tutorials/".$file_name;

    if(move_uploaded_file($temp_name, $file_dest)){
        $q = "INSERT INTO tutorials (sector, title,location) VALUES ('$sector','$file_name','$file_dest')";
        if (mysqli_query($connection, $q)) {
            $_SESSION['upload_tutorial_status'] = "Tutorial uploaded successfully.";
            header('Location: manage_tutorials.php');
        }
        else{
            $_SESSION['upload_tutorial_status'] = "Something went wrong!!";
            header('Location: manage_tutorials.php');
        }
    }
    else{
        $_SESSION['upload_tutorial_status'] = "Please select a video to upload..!!";
        header('Location: manage_tutorials.php');
    }
}

elseif (isset($_POST['upload_document_btn'])){
    $sector = $_POST['sector'];
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_dest = "documents/".$file_name;

    if(move_uploaded_file($temp_name, $file_dest)){
        $q = "INSERT INTO documents (sector,title,location) VALUES ('$sector','$file_name','$file_dest')";
        if (mysqli_query($connection, $q)) {
            $_SESSION['upload_document_status'] = "New Document uploaded successfully.";
            header('Location: manage_documents.php');
        }
        else{
            $_SESSION['upload_document_status'] = "Something went wrong!!";
            header('Location: manage_documents.php');
        }
    }
    else{
        $_SESSION['upload_document_status'] = "Please select a document to upload..!!";
        header('Location: manage_documents.php');
    }
}

elseif(isset($_POST['remove_doc_btn'])){
    $id = $_POST['remove_doc_id'];

    $query = "DELETE FROM documents WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['remove_doc_status'] = "Document Removed Successfully.";
        $_SESSION['remove_doc_status_code'] = "removed";
        header('Location: manage_documents.php');
    }
    else {
        $_SESSION['remove_doc_status'] = "Something went wrong!!";
        $_SESSION['remove_doc_status_code'] = "error";
        header('Location: manage_documents.php');
    }
}

elseif(isset($_POST['remove_tutorial_btn'])){
    $id = $_POST['remove_tutorial_id'];

    $query = "DELETE FROM tutorials WHERE tutorial_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        $_SESSION['remove_tutorial_status'] = "Tutorial Removed Successfully.";
        $_SESSION['remove_tutorial_status_code'] = "removed";
        header('Location: manage_tutorials.php');
    }
    else {
        $_SESSION['remove_tutorial_status'] = "Something went wrong!!";
        $_SESSION['remove_tutorial_status_code'] = "error";
        header('Location: manage_tutorials.php');
    }
}

?>
